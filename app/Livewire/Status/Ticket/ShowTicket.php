<?php

namespace App\Livewire\Status\Ticket;

use App\Models\TicketStatu;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTicket extends Component
{
    use WithPagination;
    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $listeners = ['render' => 'render'];

    public function destroy($id)
    {
      TicketStatu::destroy($id);
    }

    public function render()
    {
        $estado_tickets = TicketStatu::buscar($this->search)
        ->orderBy('id','asc')
        ->paginate(10);
        return view('livewire.status.ticket.show-ticket',compact('estado_tickets'));
    }
}
