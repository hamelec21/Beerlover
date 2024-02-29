<?php

namespace App\Livewire\Comunas;

use App\Models\Comuna;
use Livewire\Component;
use Livewire\WithPagination;
class ShowComunas extends Component
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
      Comuna::destroy($id);
    }

    public function render()
    {
        $comunas= Comuna::buscar($this->search)
        ->orderBy('id','Desc')
        ->paginate(10);
        return view('livewire.comunas.show-comunas',compact('comunas'));
    }
}
