<?php

namespace App\Livewire\Sectores;

use App\Models\Sector;
use Livewire\Component;
use Livewire\WithPagination;

class ShowSectores extends Component
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
      Sector::destroy($id);
    }
    public function render()
    {
        $sectores= Sector::buscar($this->search)
        ->orderBy('id','Desc')
        ->paginate(10);
        return view('livewire.sectores.show-sectores',compact('sectores'));
    }
}
