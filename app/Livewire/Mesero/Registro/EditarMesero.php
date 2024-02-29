<?php

namespace App\Livewire\Mesero\Registro;

use App\Models\User;
use Livewire\Component;

class EditarMesero extends Component
{

    public $meseroId; // variablr oculta en formulario
    public $nombre; // variables publicas del formularios
    public $apellidos; // variables publicas del formularios

    public function mount($id)
    {
        $mesero =User::find($id);
        if (!$mesero) {
            return redirect()->route('show-especialidad')->with('error', 'Registro de especialidad no encontrado.');
        }
        $this->meseroId = $mesero->id;
        $this->nombre = $mesero->name;
        $this->apellidos = $mesero->apellidos;
    }

    public function update()
    {
        $this->validate([
            'nombre' => 'required',
        ]);
        $mesero = User::find($this->meseroId);
        if (!$mesero) {
            return redirect()->route('show-mesero')->with('error', 'Registro de CEspecialidad no encontrado.');
        }
        $mesero->name = $this->nombre;
        $mesero->apellidos = $this->apellidos;
        $mesero->save();
        $this->dispatch('editar');
        return redirect()->route('show-mesero');
    }

    public function cancelar()
    {
        return redirect()->route('show-mesero');
    }
    public function render()
    {
        return view('livewire.mesero.registro.editar-mesero');
    }
}
