<?php

namespace App\Livewire\Plan;

use App\Models\Plan;
use Livewire\Component;
use Livewire\WithPagination;

class ShowPlanes extends Component
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
      Plan::destroy($id);
    }
    public function render()
    {
        $planes=Plan::buscar($this->search)
        ->orderBy('id','ASC')
        ->paginate(10);
        return view('livewire.plan.show-planes',compact('planes'));
    }
}
