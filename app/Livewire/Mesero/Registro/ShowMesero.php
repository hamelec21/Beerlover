<?php

namespace App\Livewire\Mesero\Registro;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
class ShowMesero extends Component
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
      User::destroy($id);
    }

    public function render()
    {
        $usuariosMeseros = User::role('mesero')
        ->where(function($queryBuilder) {
            $queryBuilder->where('name', 'like', "%{$this->search}%")
                         ->orWhere('email', 'like', "%{$this->search}%");
        })
        ->paginate(10);
        return view('livewire.mesero.registro.show-mesero',compact('usuariosMeseros'));
    }
}
