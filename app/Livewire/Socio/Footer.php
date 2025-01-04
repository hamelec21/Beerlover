<?php

namespace App\Livewire\Socio;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Footer extends Component
{


    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect('/comercio-asociados');
    }



    public function render()
    {
        return view('livewire.socio.footer');
    }
}
