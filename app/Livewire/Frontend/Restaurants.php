<?php

namespace App\Livewire\Frontend;
use App\Models\Comuna;
use App\Models\Especialidad;
use App\Models\Local;
use App\Models\Sector;
use Livewire\Component;
use Livewire\WithPagination;

class Restaurants extends Component
{

    use WithPagination;
    public $filtro_comuna;
    public $filtro_sector;
    public $filtro_especial;
    public $paginas;

    public function updatingFiltro_comuna()
    {
        $this->resetPage();
    }

    public function updatingFiltro_sector()
    {
        $this->resetPage();
    }

    public function updatingFiltro_especial()
    {
        $this->resetPage();
    }

    public function updatingpaginas()
    {
        $this->resetPage();
    }

    public function render()
    {
        $comercios = Local::comunas($this->filtro_comuna)
            ->especialidad($this->filtro_especial)
            ->sector($this->filtro_sector)
            ->paginate($this->paginas);

        //llenado de los campos select
        $comunas = Comuna::all();
        $sectores = Sector::all();
        $especialidades = Especialidad::all();
        return view('livewire.frontend.restaurants', compact('comercios', 'comunas', 'sectores', 'especialidades'));
    }

}
