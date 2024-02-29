<?php

namespace App\Livewire\Comunas;

use App\Models\Comuna;
use Livewire\Component;

class CrearComuna extends Component
{
    public $nombre; // variables publicas del formularios

    public function save()
    {
        $this->validate([
            'nombre' => 'required',

        ]);
        Comuna::create([
            'nombre' => $this->nombre,
        ]);

        $this->reset(['nombre']);
        $this->dispatch('render');
        $this->dispatch('insert', 'El Registro fue Creado Exitosamente');
        return redirect()->route('show-comunas');
    }

    public function cancelar()
    {
        return redirect()->route('show-comunas');
    }



    public function render()
    {
        return view('livewire.comunas.crear-comuna');
    }
}
