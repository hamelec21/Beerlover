<?php

namespace App\Livewire\Suscripcion;

use App\Models\Suscripcion;
use Livewire\Component;
use Livewire\WithPagination;

class ShowSuscripciones extends Component
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
      Suscripcion::destroy($id);
    }

    public function render()
    {
        $suscripciones=Suscripcion::buscar($this->search)
        ->orderBy('id','ASC')
        ->paginate(10);
        return view('livewire.suscripcion.show-suscripciones',compact('suscripciones'));
    }
}
