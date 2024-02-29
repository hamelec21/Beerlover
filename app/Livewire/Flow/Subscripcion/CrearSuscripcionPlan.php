<?php

namespace App\Livewire\Flow\Subscripcion;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class CrearSuscripcionPlan extends Component
{

    public $planId = "jrdeveloper";
  //  public $customerId ="cus_ubblestozk";
    public $subscription_start="2024-01-19";
    public $couponId="";
    public $trial_period_days=0;
    public $periods_number ="";

    public function createSubscription()
    {
        $apiKey = env('FLOW_API_KEY');
        $secretKey = env('FLOW_SECRET_KEY');
        $client = new Client();
        // Ordena parametros
        $params = array(
            'apiKey'=> $apiKey,
            'planId'=> $this->planId,
            'customerId'=>auth()->user()->customerId,
            'subscription_start'=>date('Y-m-d'),
            'couponId'=> $this->couponId,
            'trial_period_days'=> $this->trial_period_days,
            'periods_number'=> $this->periods_number,
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
        //   dd($params, $signature);
        $param = [
            'apiKey'=> $apiKey,
            'planId'=> $this->planId,
            'customerId'=>auth()->user()->customerId,
            'subscription_start'=>date('Y-m-d'),
            'couponId'=> $this->couponId,
            'trial_period_days'=> $this->trial_period_days,
            'periods_number'=> $this->periods_number,
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
        return view('livewire.flow.subscripcion.crear-suscripcion-plan');
    }
}
