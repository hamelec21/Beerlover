<?php

namespace App\Livewire\Mesero\Validar;

use App\Models\BlockedUser;
use App\Models\Bloqueo;
use App\Models\Local;
use App\Models\Ticket as ModelsTicket;
use App\Models\User;
use Carbon\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class Ticket extends Component
{


    public $use, $loc, $sociorut, $apellidos, $user_id , $socio;
    public $ultimoscuatrodigitos;

    public function mount($id,$user_id)
    {
       // dd($user_id,$id);
        $this->loc = Local::where('id', $id)->first();

        //consulta users
        //$this->socio = User::where('id', $user_id)->first();

        $this->socio = User::find($user_id);
      // dd($this->socio);
        $this->sociorut = $this->socio->rut;
        $rutSinFormato = str_replace(['.', '-'], '', $this->sociorut);
        $this->ultimoscuatrodigitos = substr($rutSinFormato, -5, 4);

    }

    public function validar_ticket()
    {
        // Verificar si el usuario está bloqueado en este local
        $blockedUser = BlockedUser::where('user_id', $this->user_id)
            ->where('locales_id', $this->loc->id)
            ->where('blocked_until', '>', now())
            ->exists();

        //  Si el usuario está bloqueado, mostrar un mensaje de error y redirigir
        // Si el usuario está bloqueado, calcular el tiempo restante de bloqueo y redirigir
        if ($blockedUser) {
            $blockedUntil = BlockedUser::where('user_id', $this->user_id)
                ->where('locales_id', $this->loc->id)
                ->where('blocked_until', '>', now())
                ->first()
                ->blocked_until;

            $timeRemaining = now()->diffInMinutes($blockedUntil);

            $errorMessage = '¡Su Proximo Ticket Esta Disponible En!' . $timeRemaining . ' minutos. ¡Gracias!.';

            return redirect()->route('comercio-asociados')->with('error', $errorMessage); //mesero.home
        }
        // Generar un código aleatorio para el ticket
        $codigo_ticket = Str::random(10);

        // Crear el ticket en la base de datos
        $ticket = ModelsTicket::create([
            'codigo_ticket' => $codigo_ticket,
            'ticket_status_id' => 1,
            'users_id' => $this->user_id,
            'locales_id' => $this->loc->id,
            'especialidades_id' => $this->loc->especialidades_id,
            'comunas_id' => $this->loc->comunas_id,
            'sectores_id' => $this->loc->sectores_id,
            'created_at' =>now(),
            'fecha_canje' =>now(),
            'hora' => Carbon::now()->format('H:i:s'),
        ]);
        // Verificar si el ticket fue creado exitosamente
        if ($ticket) {
            // Verificar si el ticket ha sido canjeado
            if ($ticket->ticket_status_id == 1) {
                // Bloquear el usuario en este local durante 2 minutos
                $this->bloquearUsuarioEnLocal($this->user_id, $this->loc->id);
            }
        }
        // Redirigir a la página de inicio del mesero
        $this->dispatch('render');
        $this->dispatch('insert');
        return redirect()->route('comercio-asociados'); //mesero.home
    }









    private function bloquearUsuarioEnLocal($user_id, $loc_id)
    {
        $bloqueo = Bloqueo::first();
        // Calcular el tiempo de desbloqueo (5 minutos desde ahora)
        $blocked_until = now()->addMinutes($bloqueo->tiempo);

        // Verificar si el usuario ya está bloqueado en este local
        $blockedUser = BlockedUser::where('user_id', $user_id)
            ->where('locales_id', $loc_id)
            ->first();
        // Si el usuario ya está bloqueado en este local, actualiza el tiempo de desbloqueo
        if ($blockedUser) {
            $blockedUser->blocked_until = $blocked_until;
            $blockedUser->save();
        } else {
            // Si el usuario no está bloqueado en este local, crea un nuevo registro en la tabla
            BlockedUser::create([
                'user_id' => $user_id,
                'locales_id' => $loc_id,
                'blocked_until' => $blocked_until,
            ]);
        }
    }

    public function cancelar_ticket()
    {
        // Generar un código aleatorio para el ticket
        $codigoticket = Str::random(10); // Puedes ajustar la longitud según tus necesidades
        ModelsTicket::create([
            'codigo_ticket' => $codigoticket,
            'ticket_status_id' => 2,
            'users_id' => $this->user_id,
            'locales_id' => $this->loc->id,
            'especialidades_id' => $this->loc->especialidades_id,
            'comunas_id' => $this->loc->comunas_id,
            'sectores_id' => $this->loc->sectores_id,
            'created_at' => Carbon::now(),
            'fecha_canje' => Carbon::now(),
            'hora' => Carbon::now()->format('H:i:s'),
        ]);

        //  $this->reset(['codigo_ticket','ticket_status_id','users_id','locales_id']);
        $this->dispatch('render');
        $this->dispatch('bloqueado');
        return redirect()->route('comercio-asociados');
    }










    public function render()
    {
        return view('livewire.mesero.validar.ticket');
    }
}
