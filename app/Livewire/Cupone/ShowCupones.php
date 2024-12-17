<?php

namespace App\Livewire\Cupone;

use App\Models\Cupon;
use Livewire\Component;
use Livewire\WithPagination;


class ShowCupones extends Component
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
      Cupon::destroy($id);
    }





    
    public function render()
    {
        $cupones= Cupon::buscar($this->search)
        ->orderBy('id','ASC')
        ->paginate(10);
        return view('livewire.cupone.show-cupones',compact('cupones'));
    }









}
