<?php

namespace App\Livewire\Status\Ticket;

use App\Models\TicketStatu;
use Livewire\Component;

class CrearTicket extends Component
{
    public $nombre; // variables publicas del formularios

    public function save()
    {
        $this->validate([
            'nombre' => 'required',

        ]);
        TicketStatu::create([
            'nombre' => $this->nombre,
        ]);

        $this->reset(['nombre']);
        $this->dispatch('render');
        $this->dispatch('insert', 'El Registro fue Creado Exitosamente');
        return redirect()->route('show-ticket');
    }

    public function cancelar()
    {
        return redirect()->route('show-ticket');
    }
    public function render()
    {
        return view('livewire.status.ticket.crear-ticket');
    }
}
