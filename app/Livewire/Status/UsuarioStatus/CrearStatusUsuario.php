<?php

namespace App\Livewire\Status\UsuarioStatus;

use App\Models\UsuarioStatu;
use Livewire\Component;

class CrearStatusUsuario extends Component
{
    public $nombre; // variables publicas del formularios

    public function save()
    {
        $this->validate([
            'nombre' => 'required',

        ]);
        UsuarioStatu::create([
            'nombre' => $this->nombre,
        ]);

        $this->reset(['nombre']);
        $this->dispatch('render');
        $this->dispatch('insert', 'El Registro fue Creado Exitosamente');
        return redirect()->route('show-status-usuario');
    }

    public function cancelar()
    {
        return redirect()->route('show-status-usuario');
    }

    public function render()
    {
        return view('livewire.status.usuario-status.crear-status-usuario');
    }
}
