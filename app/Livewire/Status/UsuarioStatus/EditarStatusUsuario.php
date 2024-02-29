<?php

namespace App\Livewire\Status\UsuarioStatus;

use App\Models\UsuarioStatu;
use Livewire\Component;

class EditarStatusUsuario extends Component
{
    public $usuariostatuId; // variablr oculta en formulario
    public $nombre; // variables publicas del formularios

    public function mount($id)
    {
        $usuariostatu = UsuarioStatu::find($id);
        if (!$usuariostatu) {
            return redirect()->route('show-status-usuario')->with('error', 'Registro de Estado de Usuario no encontrado.');
        }
        $this->usuariostatuId = $usuariostatu->id;
        $this->nombre = $usuariostatu->nombre;
    }

    public function update()
    {
        $this->validate([
            'nombre' => 'required',
        ]);
        $usuariostatu = UsuarioStatu::find($this->usuariostatuId);
        if (!$usuariostatu) {
            return redirect()->route('show-status-usuario')->with('error', 'Registro de Estado de Usuario no encontrado.');
        }
        $usuariostatu->nombre = $this->nombre;
        $usuariostatu->save();
        $this->dispatch('editar');
        return redirect()->route('show-status-usuario');
    }

    public function cancelar()
    {
        return redirect()->route('show-status-usuario');
    }
    public function render()
    {
        return view('livewire.status.usuario-status.editar-status-usuario');
    }
}
