<?php

namespace App\Livewire\Suscripcion;

use App\Models\User;
use App\Models\UsuarioStatu;
use Livewire\Component;

class EditarSuscrito extends Component
{

    public $statusId; // variaable oculta en formulario
    public $nombre; // variables publicas del formularios

    public function mount($id)
    {
        $usuario =User::find($id);
        if (!$usuario) {
            return redirect()->route('show-status-suscripciones')->with('error', 'Registro de tipo Suscripcion no encontrado.');
        }
        $this->statusId = $usuario->id;
        $this->nombre = $usuario->usuario_status_id;
    }


    public function update()
    {
        $this->validate([
            'nombre' => 'required',
        ]);
        $usuario =User::find($this->statusId);
        if (!$usuario) {
            return redirect()->route('show-status-suscripciones')->with('error', 'Registro de tipo Suscripcion no encontrado.');
        }
        $usuario->usuario_status_id = $this->nombre;
        $usuario->save();
        $this->dispatch('editar');
        return redirect()->route('show-suscritos');
    }

    public function cancelar()
    {
        return redirect()->route('show-suscritos');
    }
    public function render()
    {
        $estado_usuario=UsuarioStatu::all();
        return view('livewire.suscripcion.editar-suscrito',compact('estado_usuario'));
    }
}
