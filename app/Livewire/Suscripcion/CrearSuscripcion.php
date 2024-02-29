<?php

namespace App\Livewire\Suscripcion;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\GuzzleException;
use Livewire\Component;

class CrearSuscripcion extends Component
{
    public $name;
    public $email;
    public $externalId;
   // public $s;

    public function crearCliente()
    {
        $apiKey = env('FLOW_API_KEY');
        $secretKey = env('FLOW_SECRET_KEY');

        $client = new Client();

        // Ordena parametros
        $params = array(
                'apiKey' => $apiKey,
                'name' => $this->name,
                'email' => $this->email,
                'externalId' => $this->externalId
            );
        $keys = array_keys($params);

        sort($keys);

        // Concatenado
        $toSign = "";
        foreach($keys as $key) {
            $toSign .= $key . $params[$key];
        };

        // Firmado
        $signature = hash_hmac('sha256', $toSign , $secretKey);

       // dd( $params, $signature);

        $param = [
            'form_params' => [
                'apiKey' => $apiKey,
                'name' => $this->name,
                'email' => $this->email,
                'externalId' => $this->externalId,
                's' => $signature
            ]
        ];
        try {

            // $response = $client->post('https://sandbox.flow.cl/api/customer/create', $param);
            // $response = Http::post('https://sandbox.flow.cl/api/customer/create',$param);
           $client = new Client();
            $res = $client->request('POST', 'https://sandbox.flow.cl/api/customer/create', $param);
            dd( $res );
            // Manejar la respuesta según tus necesidades
            $responseData = json_decode($res->getBody(), true);

        // Puedes emitir un evento para manejar la respuesta en el frontend
        $this->dispatch('insert', $responseData);

            // Limpiar los campos después de la creación exitosa
            $this->reset(['name', 'email', 'externalId']);
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
        return view('livewire.suscripcion.crear-suscripcion');
    }
}


