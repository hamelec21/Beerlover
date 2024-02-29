<?php

namespace App\Livewire\StatusSuscripcion;

use App\Models\Status_Suscripcion;
use Livewire\Component;
use Livewire\WithPagination;

class ShowStatusSuscripciones extends Component
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
      Status_Suscripcion::destroy($id);
    }

    public function render()
    {
        $status_suscripciones=Status_Suscripcion::buscar($this->search)
        ->orderBy('id','ASC')
        ->paginate(10);
        return view('livewire.status-suscripcion.show-status-suscripciones',compact('status_suscripciones'));
    }
}
