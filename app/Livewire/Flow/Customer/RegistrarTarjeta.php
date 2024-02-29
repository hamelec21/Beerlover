<?php

namespace App\Livewire\Flow\Customer;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class RegistrarTarjeta extends Component
{
    public $customerid = "cus_sbciqddjom";
    public $url_return ="https://www.jrdeveloper.cl/";
    public $token;

    public function registroTarjeta()
    {
        try {
            $apiKey = env('FLOW_API_KEY');
            $secretKey = env('FLOW_SECRET_KEY');

            // Preparar parámetros para la solicitud a la API
            $params = [
                'apiKey' => $apiKey,
                'customerId' => $this->customerid,
                'url_return' => $this->url_return,
            ];

            $keys = array_keys($params);
            sort($keys);

            // Concatenar y firmar los parámetros
            $toSign = "";
            foreach ($keys as $key) {
                $toSign .= $key . $params[$key];
            }

            // Firmar los parámetros
            $signature = hash_hmac('sha256', $toSign, $secretKey);

            // Incluir la firma en la solicitud a la API
            $params['s'] = $signature;

            dd($params);

            // Hacer la solicitud a la API para registrar la tarjeta de crédito
            $response = Http::asForm()->post('https://www.flow.cl/api/customer/register', $params);

         //   dd($response);

            // Verificar si la solicitud fue exitosa
            if ($response->successful()) {
                $responseData = $response->json();
                // Extraer el token de la respuesta
                $this->token = $responseData['token'];
                // Redirigir al usuario a la URL de Flow con el token como parámetro de consulta
                return Redirect::to($responseData['url'] . "?token=" . $this->token);
            } else {
                // Manejar el caso en el que la solicitud de registro falla
                $this->dispatch('error');
            }
        } catch (\Exception $e) {
            // Manejar excepciones, registrar el error o despachar un evento apropiado
            $this->dispatch('error', ['message' => $e->getMessage()]);
        }
    }

    // Esta función se puede usar para verificar el estado de registro después de que el usuario vuelve a ser redirigido
    public function checkRegistrationStatus()
    {
        try {
            $apiKey = env('FLOW_API_KEY');

            // Hacer una solicitud a Flow para obtener el estado de registro
            $response = Http::get('https://www.flow.cl/api/customer/getRegisterStatus', [
                'apiKey' => $apiKey,
                'token' => $this->token,
            ]);

            // Manejar la respuesta según sea necesario
            $responseData = $response->json();

            // Puedes despachar un evento, actualizar la base de datos o realizar otras acciones según la respuesta
            $this->dispatch('registrationStatus', $responseData);
        } catch (\Exception $e) {
            // Manejar excepciones, registrar el error o despachar un evento apropiado
            $this->dispatch('error', ['message' => $e->getMessage()]);
        }
    }

    public function render()
    {
        return view('livewire.flow.customer.registrar-tarjeta');
    }
}
