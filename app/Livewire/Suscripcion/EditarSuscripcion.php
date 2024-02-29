<?php

namespace App\Livewire\Suscripcion;

use Livewire\Component;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\GuzzleException;

class EditarSuscripcion extends Component
{
    public $name;
    public $email;
    public $externalId;
    public $editingClientId; // Campo para almacenar el ID del cliente que se está editando

    public function mount($clientId)
    {
        $this->editingClientId = $clientId;
        $this->loadClientData();
    }

    public function loadClientData()
    {
        // Aquí deberías cargar los datos del cliente utilizando el ID del cliente
        // y llenar los campos $name, $email, $externalId con los datos existentes.
        // Por ejemplo, si estás usando Eloquent:
        // $client = Cliente::find($this->editingClientId);
        // $this->name = $client->name;
        // $this->email = $client->email;
        // $this->externalId = $client->external_id;
    }

    public function editarCliente()
    {
        $apiKey = env('FLOW_API_KEY');
        $secretKey = env('FLOW_SECRET_KEY');

        $client = new Client();

        // Ordena parametros
        $params = [
            'apiKey' => $apiKey,
            'name' => $this->name,
            'email' => $this->email,
            'externalId' => $this->externalId,
            'id' => $this->editingClientId,
        ];

        $keys = array_keys($params);

        sort($keys);

        // Concatenado
        $toSign = "";
        foreach ($keys as $key) {
            $toSign .= $key . $params[$key];
        }

        // Firmado
        $signature = hash_hmac('sha256', $toSign, $secretKey);

        $param = [
            'form_params' => [
                'apiKey' => $apiKey,
                'name' => $this->name,
                'email' => $this->email,
                'externalId' => $this->externalId,
                'id' => $this->editingClientId,
                's' => $signature,
            ],
        ];

        $url = 'https://sandbox.flow.cl/api/customer/edit';

        try {
            $client = new Client();
            $res = $client->request('POST', $url, $param);

            // Manejar la respuesta según tus necesidades
            $responseData = json_decode($res->getBody(), true);

            // Puedes emitir un evento para manejar la respuesta en el frontend
            $this->dispatch('update', $responseData);

            // Limpiar los campos después de la edición exitosa
            $this->reset(['name', 'email', 'externalId', 'editingClientId']);
        } catch (RequestException $e) {
            // Manejar errores de solicitud (por ejemplo, si la API devuelve un error)
            $this->dispatch('error', ['message' => $e->getMessage()]);
        } catch (GuzzleException $e) {
            // Manejar otros errores de Guzzle
            $this->dispatch('error', ['message' => $e->getMessage()]);
        }
    }
    public function render()
    {
        return view('livewire.suscripcion.editar-suscripcion');
    }
}
