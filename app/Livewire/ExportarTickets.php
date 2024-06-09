<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Ticket;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportarTickets extends Component
{
    public $fechaInicio;
    public $fechaFin;
    public $estado;

    public function exportar()
    {
        $fechaInicio = $this->fechaInicio;
        $fechaFin = $this->fechaFin;
        $estado = $this->estado;

        return Excel::download(new class($fechaInicio, $fechaFin, $estado) implements FromCollection, WithHeadings, ShouldAutoSize
        {
            use Exportable;

            protected $fechaInicio;
            protected $fechaFin;
            protected $estado;

            public function __construct($fechaInicio, $fechaFin, $estado)
            {
                $this->fechaInicio = $fechaInicio;
                $this->fechaFin = $fechaFin;
                $this->estado = $estado;
            }

            public function collection()
            {
                return Ticket::with(['usuario', 'local', 'especialidad', 'sector', 'comuna', 'ticket_estado'])
                    ->select('id', 'codigo_ticket', 'ticket_status_id', 'users_id', 'locales_id', 'especialidades_id', 'sectores_id', 'comunas_id', 'fecha_canje' ,'hora')
                    ->when($this->fechaInicio, function ($query) {
                        return $query->whereDate('fecha_canje', '>=', $this->fechaInicio);
                    })->when($this->fechaFin, function ($query) {
                        return $query->whereDate('fecha_canje', '<=', $this->fechaFin);
                    })->when($this->estado, function ($query) {
                        return $query->where('ticket_status_id', $this->estado);
                    })->get()

                    ->map(function ($ticket) {
                        $ticket->usuario_name = $ticket->usuario->name ?? '';// Assuming 'nombre' is the column for the estado's name
                        $ticket->comercio_name = $ticket->local->nombre ?? '';
                        $ticket->ticket_estado_name = $ticket->ticket_estado->nombre ?? '';
                        $ticket->especialidad_name = $ticket->especialidad->nombre ?? '';
                        $ticket->sector_name = $ticket->sector->nombre ?? '';
                        $ticket->fecha_canje = \Carbon\Carbon::parse($ticket->fecha_canje)->format('d-m-Y'); // Formato deseado
                        $ticket->comuna_name = $ticket->comuna->nombre ?? ''; 

                        unset($ticket->usuario, $ticket->local, $ticket->especialidad, $ticket->sector, $ticket->comuna, $ticket->ticket_estado);
                        unset($ticket->users_id, $ticket->locales_id, $ticket->especialidades_id, $ticket->sectores_id, $ticket->comunas_id, $ticket->ticket_status_id); // Remove the relationships data if not needed
                        return $ticket;
                    });
            }

            public function headings(): array
            {
                return [
                    'ID',
                    'Codigo Ticket',
                    'Fecha de Canje',
                    'Hora de Canje',
                    'Nombre del Usuario', // Se muestra primero según el orden de la colección
                    'Nombre del Comercio',
                    'Estado Ticket', // Modificamos el encabezado para reflejar el nombre del estado del ticket
                    'Nombre de la Especialidad',
                    'Sector',
                    'Comuna',
                ];
            }
        }, 'tickets.xlsx');
    }

    public function render()
    {
        return view('livewire.exportar-tickets');
    }
}
