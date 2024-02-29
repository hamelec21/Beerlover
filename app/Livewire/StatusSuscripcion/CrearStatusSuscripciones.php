<?php

namespace App\Livewire\StatusSuscripcion;

use App\Models\Status_Suscripcion;
use Livewire\Component;

class CrearStatusSuscripciones extends Component
{
    public $nombre; // variables publicas del formularios

    public function save()
    {
        $this->validate([
            'nombre' => 'required',

        ]);
        Status_Suscripcion::create([
            'nombre' => $this->nombre,
        ]);

        $this->reset(['nombre']);
        $this->dispatch('render');
        $this->dispatch('insert', 'El Registro fue Creado Exitosamente');
        return redirect()->route('show-status-suscripciones');
    }

    public function cancelar()
    {
        return redirect()->route('show-status-suscripciones');
    }
    public function render()
    {
        return view('livewire.status-suscripcion.crear-status-suscripciones');
    }
}
