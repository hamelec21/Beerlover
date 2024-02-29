<?php

namespace App\Livewire\Especialidad;

use App\Models\Especialidad;
use Livewire\Component;
use Livewire\WithPagination;

class ShowEspecialidad extends Component
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
      Especialidad::destroy($id);
    }
    public function render()
    {
        $especialidades= Especialidad::buscar($this->search)
        ->orderBy('id','ASC')
        ->paginate(10);
        return view('livewire.especialidad.show-especialidad',compact('especialidades'));
    }
}
