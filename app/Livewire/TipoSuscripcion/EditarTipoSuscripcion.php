<?php

namespace App\Livewire\TipoSuscripcion;

use App\Livewire\Socio\Ticket;
use App\Models\Tipo_Suscripcion;
use Livewire\Component;
class EditarTipoSuscripcion extends Component
{
    public $tiposusId; // variaable oculta en formulario
    public $nombre; // variables publicas del formularios

    public function mount($id)
    {
        $tiposuscripcion =Tipo_Suscripcion::find($id);
        if (!$tiposuscripcion) {
            return redirect()->route('Show-tipo-suscripcion')->with('error', 'Registro de tipo Suscripcion no encontrado.');
        }
        $this->tiposusId = $tiposuscripcion->id;
        $this->nombre = $tiposuscripcion->nombre;
    }

    public function update()
    {
        $this->validate([
            'nombre' => 'required',
        ]);
        $tiposuscripcion =Tipo_Suscripcion::find($this->tiposusId);
        if (!$tiposuscripcion) {
            return redirect()->route('Show-tipo-suscripcion')->with('error', 'Registro de tipo Suscripcion no encontrado.');
        }
        $tiposuscripcion->nombre = $this->nombre;
        $tiposuscripcion->save();
        $this->dispatch('editar');
        return redirect()->route('show-tipo-suscripciones');
    }

    public function cancelar()
    {
        return redirect()->route('show-tipo-suscripciones');
    }
    public function render()
    {
        return view('livewire.tipo-suscripcion.editar-tipo-suscripcion');
    }
}
