<?php

namespace App\Livewire\Flow\Customer;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

use Livewire\Component;

class CrearCliente extends Component
{



    public function suscripcion()
    {
      $this->crearcliente();
     //  $this->createSubscription();
    }


    public function crearCliente() //ok
    {
        $apiKey = env('FLOW_API_KEY');
        $secretKey = env('FLOW_SECRET_KEY');
        $client = new Client();
        // Ordena parametros
        $params = array(
            'apiKey' => $apiKey,
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'externalId' => auth()->user()->rut,
        );
        $keys = array_keys($params);

        sort($keys);
        // dd($keys);
        // Concatenado
        $toSign = "";
        foreach ($keys as $key) {
            $toSign .= $key . $params[$key];
        };

        // Firmado
        $signature = hash_hmac('sha256', $toSign, $secretKey);

        //dd($params, $signature);
        $param = [
            'apiKey' => $apiKey,
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'externalId' => auth()->user()->rut,
            's' => $signature
        ];
        //  dd($param);
        try {
            $response = Http::asForm()->post('https://sandbox.flow.cl/api/customer/create', $param);
            //dd($response);
            //$responseData = json_decode($response->getBody(), true);
            //  dd($responseData);
            // Puedes emitir un evento para manejar la respuesta en el frontend
            // $this->dispatch('insert', $responseData);
            // Limpiar los campos después de la creación exitosa
            // $this->reset(['name', 'email', 'externalId']);
            // Obtener el código de respuesta HTTP
            $statusCode = $response->status();

            // Manejar diferentes códigos de respuesta
            switch ($statusCode) {
                case 200:
                    // Código 200 (Éxito): Puedes manejar el éxito según tus necesidades
                    $responseData = json_decode($response->getBody(), true);
                    DB::table('users')
                        ->where('id', auth()->user()->id)
                        ->update(['customerId' => $responseData['customerId']]);
                    // aca creo el update tabla
                  //  $this->dispatch('insert', $responseData);
                  return redirect()->route('subscripcion.crear-suscripcion-plan');


             break;

                case 400:
                    // Código 400 (Solicitud incorrecta): Manejar el error según tus necesidades
                    $this->dispatch('error400', ['message' => 'Error en la solicitud: ' . $response->getBody()]);
                    break;

                case 401:
                    // Código 401 (No autorizado): Manejar el error según tus necesidades
                    $this->dispatch('error401', ['message' => 'No autorizado: ' . $response->getBody()]);
                    break;

                default:
                    // Otros códigos de respuesta: Manejar según tus necesidades
                    $this->dispatch('error', ['message' => 'Error desconocido: ' . $statusCode]);
                    break;
            }
        } catch (RequestException $e) {
            // Manejar errores de solicitud (por ejemplo, si la API devuelve un error)
            $this->dispatch('error', ['message' => $e->getMessage()]);
        } catch (GuzzleException $e) {
            // Manejar otros errores de Guzzle
            $this->dispatch('error', ['message' => $e->getMessage()]);
        }
    }

    public function createSubscription()
    {

        $planId="jrdeveloper";
        $subscription_start=date('Y-m-d');
        $couponId="";
        $trial_period_days=0;
        $periods_number="";
        $apiKey = env('FLOW_API_KEY');
        $secretKey = env('FLOW_SECRET_KEY');
        $client = new Client();
        // Ordena parametros
        $params = array(
            'apiKey'=>$apiKey,
            'planId'=>$planId,
            'customerId'=>auth()->user()->customerId,
            'subscription_start'=>$subscription_start,
            'couponId'=>$couponId,
            'trial_period_days'=>$trial_period_days,
            'periods_number'=>$periods_number,
        );
        $keys = array_keys($params);
        sort($keys);
        // dd($keys);
        // Concatenado
        $toSign = "";
        foreach ($keys as $key) {
            $toSign .= $key . $params[$key];
        };
        // Firmado
        $signature = hash_hmac('sha256', $toSign, $secretKey);
        // dd($signature);
           //dd($params, $signature);
        $param = [
            'apiKey'=>$apiKey,
            'planId'=>$planId,
            'customerId'=>auth()->user()->customerId,
            'subscription_start'=>$subscription_start,
            'couponId'=>$couponId,
            'trial_period_days'=>$trial_period_days,
            'periods_number'=>$periods_number,
            's'=> $signature
        ];
        // dd($param);
        try {
            $response = Http::asForm()->post('https://sandbox.flow.cl/api/subscription/create', $param);
             //dd($response);

            // Obtener el código de respuesta HTTP
            $statusCode = $response->status();
            // Manejar diferentes códigos de respuesta
            switch ($statusCode) {
                case 200:
                    // Código 200 (Éxito): Puedes manejar el éxito según tus necesidades
                    $responseData = json_decode($response->getBody(), true);
                    $this->dispatch('insert', $responseData);
                    return redirect()->route('socio.home');
                    break;

                case 400:
                    // Código 400 (Solicitud incorrecta): Manejar el error según tus necesidades
                    $this->dispatch('error400', ['message' => 'Error en la solicitud: ' . $response->getBody()]);
                    break;

                case 401:
                    // Código 401 (No autorizado): Manejar el error según tus necesidades
                    $this->dispatch('error401', ['message' => 'No autorizado: ' . $response->getBody()]);
                    break;

                default:
                    // Otros códigos de respuesta: Manejar según tus necesidades
                    $this->dispatch('error', ['message' => 'Error desconocido: ' . $statusCode]);
                    break;
            }
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
        return view('livewire.flow.customer.crear-cliente');
    }
}
