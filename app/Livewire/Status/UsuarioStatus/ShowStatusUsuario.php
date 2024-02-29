<?php

namespace App\Livewire\Status\UsuarioStatus;

use App\Models\UsuarioStatu;
use Livewire\Component;
use Livewire\WithPagination;

class ShowStatusUsuario extends Component
{
    use WithPagination;
    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $listeners = ['render' => 'render'];

    public function destroy($id)
    {
      UsuarioStatu::destroy($id);
    }
    public function render()
    {

        $estado_usuarios = UsuarioStatu::buscar($this->search)
        ->orderBy('id','asc')
        ->paginate(10);
        return view('livewire.status.usuario-status.show-status-usuario',compact('estado_usuarios'));
    }
}
