<?php

namespace App\Livewire\Usuario;


use App\Models\Ticket;
use App\Models\User;
use Livewire\Component;
use NumberFormatter;

class Show extends Component
{

    public $open_show =false;

    public $id, $ticket,$datosocio;

    public function mount(Ticket $ticket)
    {
        $this->ticket = $ticket;

        $this->datosocio = User::where('id', $this->ticket->users_id)
            ->whereHas('roles', function ($query) {
                $query->where('name', 'SOCIO');
            })->first();
    }
    public function formatRut($rut)
    {
        // Eliminar cualquier carácter que no sea un dígito o la letra 'k' (o 'K')
        $rut = preg_replace('/[^0-9kK]/', '', $rut);

        // Separar el número del dígito verificador
        $numero = substr($rut, 0, -1);
        $verificador = substr($rut, -1);
        // Formatear el número con puntos
        $numeroFormateado = number_format($numero, 0, '', '.');
        // Unir el número formateado con el dígito verificador
        $rutFormateado = $numeroFormateado . '-' . $verificador;
        return $rutFormateado;
    }

    public function render()
    {
        return view('livewire.usuario.show');
    }
}
