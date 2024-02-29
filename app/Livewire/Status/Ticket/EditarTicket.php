<?php

namespace App\Livewire\Status\Ticket;

use App\Models\TicketStatu;
use Livewire\Component;

class EditarTicket extends Component
{
    public $ticketstatuId; // variablr oculta en formulario
    public $nombre; // variables publicas del formularios

    public function mount($id)
    {
        $ticketstatu = TicketStatu::find($id);
        if (!$ticketstatu) {
            return redirect()->route('show-ticket')->with('error', 'Registro de Estado de Ticket  no encontrado.');
        }
        $this->ticketstatuId = $ticketstatu->id;
        $this->nombre = $ticketstatu->nombre;
    }

    public function update()
    {
        $this->validate([
            'nombre' => 'required',
        ]);
        $ticketstatu = TicketStatu::find($this->ticketstatuId);
        if (!$ticketstatu) {
            return redirect()->route('show-ticket')->with('error', 'Registro de Estado de Ticket no encontrado.');
        }
        $ticketstatu->nombre = $this->nombre;
        $ticketstatu->save();
        $this->dispatch('editar');
        return redirect()->route('show-ticket');
    }

    public function cancelar()
    {
        return redirect()->route('show-ticket');
    }
    public function render()
    {
        return view('livewire.status.ticket.editar-ticket');
    }
}
