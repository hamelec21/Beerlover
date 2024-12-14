<?php

namespace App\Exports;

use App\Models\Ticket;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DatosTicketsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Ticket::with([
            'usuario',           // Relación con el usuario
            'local',          // Relación con el comercio
            'ticket_estado',   // Relación con el estado del ticket
            'especialidad',   // Relación con la especialidad
            'sector',         // Relación con el sector
            'comuna'          // Relación con la comuna
        ])->get();




       //'usuario', 'local', 'especialidad', 'sector', 'comuna', 'ticket_estado'
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Codigo Ticket',
            'Fecha de Canje',
            'Hora de Canje',
            'Nombre del Usuario',
            'Nombre del Comercio',
            'Estado Ticket',
            'Nombre de la Especialidad',
            'Sector',
            'Comuna',
        ];
    }

    /**
     * @param \App\Models\Ticket $ticket
     * @return array
     */
    public function map($ticket): array
    {
        return [
            $ticket->id,
            $ticket->codigo_ticket,
            $ticket->usuario() ? $ticket->usuario->name : 'N/A',
            $ticket->local ? $ticket->local->nombre : 'N/A',
            $ticket->ticket_estado ? $ticket->ticket_estado->nombre : 'N/A',
            $ticket->especialidad ? $ticket->especialidad->nombre : 'N/A',
            $ticket->sector ? $ticket->sector->nombre : 'N/A',
            $ticket->comuna ? $ticket->comuna->nombre : 'N/A',
            $ticket->fecha_canje,
            $ticket->hora,
        ];
    }
}
