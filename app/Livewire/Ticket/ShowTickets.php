<?php

namespace App\Livewire\Ticket;

use App\Models\Local;
use App\Models\Ticket;
use App\Models\TicketStatu;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;



class ShowTickets extends Component
{
    use WithPagination;
    public $search;
    public $filtro_estado;
    public $local;
    public $query;


    public function mount()
    {
       $query=Ticket::first();
       $local=Local::where('id',$query->locales_id)->first();
       //dd( $local);
    }



    public function render()
    {
        $tickets = Ticket::buscar($this->search)
            ->estado($this->filtro_estado)
            ->orderBy('id', 'Desc')
            ->paginate(10);



        $estados = TicketStatu::all();
        return view('livewire.ticket.show-tickets', compact('tickets', 'estados'));
    }
}
