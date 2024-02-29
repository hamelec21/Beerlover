<?php

namespace App\Livewire\TipoSuscripcion;

use App\Models\Tipo_Suscripcion;
use Livewire\Component;

class CrearTipoSuscripcion extends Component
{
    public $nombre; // variables publicas del formularios

    public function save()
    {
        $this->validate([
            'nombre' => 'required',

        ]);
        Tipo_Suscripcion::create([
            'nombre' => $this->nombre,
        ]);

        $this->reset(['nombre']);
        $this->dispatch('render');
        $this->dispatch('insert', 'El Registro fue Creado Exitosamente');
        return redirect()->route('show-tipo-suscripciones');
    }

    public function cancelar()
    {
        return redirect()->route('show-tipo-suscripciones');
    }
    public function render()
    {
        return view('livewire.tipo-suscripcion.crear-tipo-suscripcion');
    }
}
