<?php

namespace App\Livewire\Wiget;

use App\Models\Local;
use App\Models\Ticket;
use App\Models\User;
use Livewire\Component;

class Contadores extends Component
{
    public function render()
    {
        $registrados=User::where('usuario_status_id',1);
        $pendientes=User::where('usuario_status_id',2);
        $activos=User::where('usuario_status_id',3);
        $suspendidos=User::where('usuario_status_id',4);
        $bajas=User::where('usuario_status_id',5);


       $ticketcanjeados=Ticket::where('ticket_status_id',1);
       $ticketbloqueados=Ticket::where('ticket_status_id',2);
       $tickettotales=Ticket::all();

        $locales=Local::all();





        return view('livewire.wiget.contadores',compact('registrados','pendientes','activos','suspendidos','bajas','ticketcanjeados','ticketbloqueados','tickettotales','locales'));
    }
}
