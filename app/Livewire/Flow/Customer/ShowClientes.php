<?php

namespace App\Livewire\Flow\Customer;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Livewire\WithPagination;

class ShowClientes extends Component
{
    use WithPagination;
    public $clients;
    public $start = 0;
    public $limit= 30; //cantidad de registros por paginas
    public $filter = '';
    public $status = 1;
    public function mount()
    {
        $this->start;
        $this->limit;
        $this->getClients();
    }

    public function getClients()
    {
        $apiKey = env('FLOW_API_KEY');
        $secretKey = env('FLOW_SECRET_KEY');

        $data = [
            'apiKey' => $apiKey,
            'start' => $this->start,
            'limit' => $this->limit,
            'filter' => $this->filter,
            'status' => $this->status
        ];

        $signature = $this->calculateSignature($data, $secretKey);
        $data['s'] = $signature;
        //dd($data); // trae todos los parametros
        try {
            $response = Http::get('https://sandbox.flow.cl/api/customer/list', ($data)); //revisar
            // dd($response); //status code 200
            $body = $response->getBody()->getContents();
            // dd($body);
            $this->clients = json_decode($body, true);
            // dd($this->clients);  //muestras los datos

        } catch (\Exception $e) {
            // Manejar errores de la solicitud
            $this->clients = [];
            // Puedes imprimir o registrar el mensaje de error para obtener más información
            echo $e->getMessage();
        }
    }

    protected function calculateSignature($data, $secretKey)
    {
        ksort($data);
        $toSign = '';
        foreach ($data as $key => $value) {
            $toSign .= $key . $value;
        }

        // dd($toSign);
        return hash_hmac('sha256', $toSign, $secretKey);
    }

    public function updateStart($start)
    {
        $this->start = $start;
        $this->getClients();
    }

    public function updateLimit($limit)
    {
        $this->limit = $limit;
        $this->getClients();
    }

    public function updateFilter($filter)
    {
        $this->filter = $filter;
        $this->getClients();
    }

    public function updateStatus($status)
    {
        $this->status = $status;
        $this->getClients();
    }

    public function render()
    {
        $clients = $this->clients['data'];

        return view('livewire.flow.customer.show-clientes', ['clients' => $clients]);
    }
}
