<?php

namespace App\Livewire\Ticket;

use App\Exports\DatosTicketsExport;
use App\Models\Local;
use App\Models\Ticket;
use App\Models\TicketStatu;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
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
        $query = Ticket::first();

        if ($query && $query->locales_id) {
            $this->local = Local::where('id', $query->locales_id)->first();
        } else {
            // Manejar el caso cuando no se encuentra ningún ticket o no tiene un locales_id
            $this->local = null;  // O cualquier otro valor predeterminado que desees
        }
    }


    public function exportToExcel()
    {
        return Excel::download(new DatosTicketsExport, 'tickets.xlsx');
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
