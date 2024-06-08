<?php

namespace App\Livewire\Usuario;


use App\Models\Ticket;
use App\Models\User;
use Livewire\Component;

class Show extends Component
{

    public $open_show = true;//false;

    public $id, $ticket,$datosocio;

    public function mount(Ticket $ticket)
    {
        $this->ticket = $ticket;

        $this->datosocio = User::where('id', $this->ticket->users_id)
            ->whereHas('roles', function ($query) {
                $query->where('name', 'SOCIO');
            })->first();
    }

    public function render()
    {
        return view('livewire.usuario.show');
    }
}
