<?php

namespace App\Livewire\Comercios;

use App\Models\Local;
use Livewire\Component;
use Livewire\WithPagination;

class ShowComercio extends Component
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
      Local::destroy($id);
    }

    public function render()
    {
        $comercios= Local::buscar($this->search)
        ->orderBy('id','Desc')
        ->paginate(10);
        return view('livewire.comercios.show-comercio',compact('comercios'));
    }
}
