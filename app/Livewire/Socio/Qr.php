<?php

namespace App\Livewire\Socio;

use App\Models\BlockedUser;
use App\Models\Local;
use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Qr extends Component
{
    public $id;
    public $comercio;
    public $user_id;

    public function mount($id)
    {
        $this->id = $id;
        $this->comercio = Local::where('id', $this->id)->first();
        $this->user_id = auth()->user()->id;
        if ($this->comercio) {
            $blockedUser = BlockedUser::where('user_id', $this->user_id)
                ->where('locales_id', $this->comercio->id)
                ->where('blocked_until', '>', now())
                ->exists();
            // Si el usuario está bloqueado, calcular el tiempo restante de bloqueo y redirigir
            if ($blockedUser) {
                $blockedUntil = BlockedUser::where('user_id', $this->user_id)
                    ->where('locales_id', $this->comercio->id)
                    ->where('blocked_until', '>', now())
                    ->first()
                    ->blocked_until;

                $timeRemaining = now()->diffInMinutes($blockedUntil);

                $errorMessage = '¡Su Proximo Ticket Esta Disponible En! ' . $timeRemaining . ' minutos. ¡Gracias!.';

                return redirect()->route('mesero.home')->with('error', $errorMessage);
            }
        } else {
            // Manejar el caso donde no se encuentra el comercio
            return redirect()->route('mesero.home')->with('error', '¡El comercio no existe!');
        }

    }

    public function render()
    {

        return view('livewire.socio.qr');
    }
}
