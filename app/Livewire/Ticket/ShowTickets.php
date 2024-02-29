<?php

namespace App\Livewire\Ticket;

use App\Models\Ticket;
use App\Models\TicketStatu;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTickets extends Component
{
    use WithPagination;
    public $search;
    public $filtro_estado;

    public function render()
    {
        $tickets =Ticket::buscar($this->search)
        ->estado($this->filtro_estado)
        ->orderBy('id','Desc')
        ->paginate(10);

        $estados= TicketStatu::all();


        return view('livewire.ticket.show-tickets',compact('tickets','estados'));
    }



   // $comercios = Local::comunas($this->filtro_comuna)
  //  ->especialidad($this->filtro_especial)
   // ->sector($this->filtro_sector)
  // ->paginate(10);



}
