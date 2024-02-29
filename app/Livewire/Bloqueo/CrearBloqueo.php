<?php

namespace App\Livewire\Bloqueo;

use App\Models\Bloqueo;
use Livewire\Component;

class CrearBloqueo extends Component
{

    public $nombre; // variables publicas del formularios
    public function save()
    {
        $this->validate([
            'tiempo' => 'required',
        ]);
        Bloqueo::create([
            'tiempo' => $this->nombre,
        ]);
        $this->reset(['tiempo']);
        $this->dispatch('render');
        $this->dispatch('insert', 'El Registro fue Creado Exitosamente');
        return redirect()->route('show-bloqueo');
    }

    public function cancelar()
    {
        return redirect()->route('show-bloqueo');
    }

    public function render()
    {
        return view('livewire.bloqueo.crear-bloqueo');
    }
}
