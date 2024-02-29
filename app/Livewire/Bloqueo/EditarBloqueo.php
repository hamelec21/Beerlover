<?php

namespace App\Livewire\Bloqueo;

use App\Models\Bloqueo;
use Livewire\Component;

class EditarBloqueo extends Component
{
    public $bloqueoId; // variablr oculta en formulario
    public $tiempo; // variables publicas del formularios

    public function mount($id)
    {
        $bloqueo= Bloqueo::find($id);
        if (!$bloqueo) {
            return redirect()->route('show-bloqueo')->with('error', 'Registro de bloqueo no encontrado.');
        }
        $this->bloqueoId = $bloqueo->id;
        $this->tiempo = $bloqueo->tiempo;
    }

    public function update()
    {
        $this->validate([
            'tiempo' => 'required',
        ]);
        $bloqueo = Bloqueo::find($this->bloqueoId);
        if (!$bloqueo) {
            return redirect()->route('show-bloqueo')->with('error', 'Registro de bloqueo no encontrado.');
        }
        $bloqueo->tiempo = $this->tiempo;
        $bloqueo->save();
        $this->dispatch('editar');
        return redirect()->route('show-bloqueo');
    }

    public function cancelar()
    {
        return redirect()->route('show-especialidad');
    }
    public function render()
    {
        return view('livewire.bloqueo.editar-bloqueo');
    }
}
