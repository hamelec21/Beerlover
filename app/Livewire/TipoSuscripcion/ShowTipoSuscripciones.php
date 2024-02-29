<?php

namespace App\Livewire\TipoSuscripcion;

use App\Models\Tipo_Suscripcion;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTipoSuscripciones extends Component
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
      Tipo_Suscripcion::destroy($id);
    }

    public function render()
    {
        $tipo_suscripciones= Tipo_Suscripcion::buscar($this->search)
        ->orderBy('id','ASC')
        ->paginate(10);
        return view('livewire.tipo-suscripcion.show-tipo-suscripciones',compact('tipo_suscripciones'));
    }
}
