<?php

namespace App\Livewire\Especialidad;

use App\Models\Especialidad;
use Livewire\Component;

class EditarEspecialidad extends Component
{
    public $especialidadId; // variablr oculta en formulario
    public $nombre; // variables publicas del formularios

    public function mount($id)
    {
        $especialidad = Especialidad::find($id);
        if (!$especialidad) {
            return redirect()->route('show-especialidad')->with('error', 'Registro de especialidad no encontrado.');
        }
        $this->especialidadId = $especialidad->id;
        $this->nombre = $especialidad->nombre;
    }

    public function update()
    {
        $this->validate([
            'nombre' => 'required',
        ]);
        $especialidad = Especialidad::find($this->especialidadId);
        if (!$especialidad) {
            return redirect()->route('show-especialidad')->with('error', 'Registro de CEspecialidad no encontrado.');
        }
        $especialidad->nombre = $this->nombre;
        $especialidad->save();
        $this->dispatch('editar');
        return redirect()->route('show-especialidad');
    }

    public function cancelar()
    {
        return redirect()->route('show-especialidad');
    }
    public function render()
    {
        return view('livewire.especialidad.editar-especialidad');
    }
}
