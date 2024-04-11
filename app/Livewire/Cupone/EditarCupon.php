<?php

namespace App\Livewire\Cupone;

use App\Models\Cupon;
use Livewire\Component;

class EditarCupon extends Component
{
    public $cuponId; // variable oculta en formulario
    public $nombre; // variables publicas del formularios

    public function mount($id)
    {
        $cupon = Cupon::find($id);
        if (!$cupon) {
            return redirect()->route('show-cupones')->with('error', 'Registro de especialidad no encontrado.');
        }
        $this->cuponId = $cupon->id;
        $this->nombre = $cupon->nombre;
    }

    public function update()
    {
        $this->validate([
            'nombre' => 'required',
        ]);
        $cupon = Cupon::find($this->cuponId);
        if (!$cupon) {
            return redirect()->route('show-cupones')->with('error', 'Registro de Cupones no encontrado.');
        }
        $cupon->nombre = $this->nombre;
        $cupon->save();
        $this->dispatch('editar');
        return redirect()->route('show-cupones');
    }

    public function cancelar()
    {
        return redirect()->route('show-cupones');
    }


    public function render()
    {
        return view('livewire.cupone.editar-cupon');
    }
}
