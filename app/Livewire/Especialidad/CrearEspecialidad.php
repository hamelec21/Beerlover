<?php

namespace App\Livewire\Especialidad;

use App\Models\Especialidad;
use Livewire\Component;

class CrearEspecialidad extends Component
{
    public $nombre; // variables publicas del formularios
    public function save()
    {
        $this->validate([
            'nombre' => 'required',
        ]);
        Especialidad::create([
            'nombre' => $this->nombre,
        ]);
        $this->reset(['nombre']);
        $this->dispatch('render');
        $this->dispatch('insert', 'El Registro fue Creado Exitosamente');
        return redirect()->route('show-especialidad');
    }

    public function cancelar()
    {
        return redirect()->route('show-especialidad');
    }


    public function render()
    {
        return view('livewire.especialidad.crear-especialidad');
    }
}
