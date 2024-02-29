<?php

namespace App\Livewire\StatusSuscripcion;

use App\Models\Status_Suscripcion;
use Livewire\Component;

class EditarStatusSuscripciones extends Component
{
    public $statusId; // variaable oculta en formulario
    public $nombre; // variables publicas del formularios

    public function mount($id)
    {
        $statussuscripcion =Status_Suscripcion::find($id);
        if (!$statussuscripcion) {
            return redirect()->route('show-status-suscripciones')->with('error', 'Registro de tipo Suscripcion no encontrado.');
        }
        $this->statusId = $statussuscripcion->id;
        $this->nombre = $statussuscripcion->nombre;
    }

    public function update()
    {
        $this->validate([
            'nombre' => 'required',
        ]);
        $statussuscripcion =Status_Suscripcion::find($this->statusId);
        if (!$statussuscripcion) {
            return redirect()->route('show-status-suscripciones')->with('error', 'Registro de tipo Suscripcion no encontrado.');
        }
        $statussuscripcion->nombre = $this->nombre;
        $statussuscripcion->save();
        $this->dispatch('editar');
        return redirect()->route('show-status-suscripciones');
    }

    public function cancelar()
    {
        return redirect()->route('show-tipo-suscripciones');
    }
    public function render()
    {
        return view('livewire.status-suscripcion.editar-status-suscripciones');
    }
}
