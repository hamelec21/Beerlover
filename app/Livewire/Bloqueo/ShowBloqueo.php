<?php

namespace App\Livewire\Bloqueo;

use App\Models\Bloqueo;
use Livewire\Component;

class ShowBloqueo extends Component
{
    protected $listeners = ['render' => 'render'];

    public function render()
    {
        $bloqueos=Bloqueo::all();

        return view('livewire.bloqueo.show-bloqueo',compact('bloqueos'));
    }

}
