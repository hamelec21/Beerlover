<?php

namespace App\Livewire\Socio;

use App\Models\BlockedUser;
use App\Models\Comuna;
use App\Models\Especialidad;
use App\Models\Local;
use App\Models\Sector;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;
    public $filtro_comuna;
    public $filtro_sector;
    public $filtro_especial;
    public $comercio;

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

    public function render()
    {
        $comercios = Local::comunas($this->filtro_comuna)
            ->especialidad($this->filtro_especial)
            ->sector($this->filtro_sector)
            ->paginate(10);

        //llenado de los campos select
        $comunas = Comuna::all();
        $sectores = Sector::all();
        $especialidades = Especialidad::all();
        return view('livewire.socio.home', compact('comercios', 'comunas', 'sectores', 'especialidades'));
    }

}
