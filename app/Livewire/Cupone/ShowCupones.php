<?php

namespace App\Livewire\Cupone;

use App\Models\Cupon;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\CuponesExport;
use Maatwebsite\Excel\Facades\Excel;


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


    public function exportCampanaToExcel()
    {
        return Excel::download(new CuponesExport, 'cupones.xlsx');
    }


    public function render()
    {
        $cupones = Cupon::withCount('users')
        ->buscar($this->search)
        ->orderBy('id', 'ASC')
        ->paginate(10);
        return view('livewire.cupone.show-cupones',compact('cupones'));
    }

}
