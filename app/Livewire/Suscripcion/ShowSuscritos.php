<?php

namespace App\Livewire\Suscripcion;

use App\Models\User;
use App\Models\UsuarioStatu;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ShowSuscritos extends Component
{

    use WithPagination;
    public $search;
    public $filtro_estado;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $listeners = ['render' => 'render'];

    public function destroy($id)
    {
      User::destroy($id);
    }

    public function render()
    {
        // Obtenemos el usuario actual
        $user = Auth::user();


    // Filtramos los usuarios que tengan el rol de "socio" y el estado deseado
    $usuarios = User::buscar($this->search)
                    ->whereHas('roles', function ($query) {
                        $query->where('name', 'socio');
                    })
                    ->status($this->filtro_estado) // Suponiendo que 'estado' es un método de consulta personalizado
                    ->orderBy('id', 'desc')
                    ->paginate(10);

                    $estado_usuario=UsuarioStatu::all();

        return view('livewire.suscripcion.show-suscritos', compact('usuarios','estado_usuario'));
    }

}
