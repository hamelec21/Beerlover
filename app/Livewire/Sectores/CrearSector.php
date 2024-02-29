<?php

namespace App\Livewire\Sectores;

use App\Models\Sector;
use Livewire\Component;

class CrearSector extends Component
{
    public $nombre; // variables publicas del formularios

    public function save()
    {
        $this->validate([
            'nombre' => 'required',

        ]);
        Sector::create([
            'nombre' => $this->nombre,
        ]);

        $this->reset(['nombre']);
        $this->dispatch('render');
        $this->dispatch('insert', 'El Registro fue Creado Exitosamente');
        return redirect()->route('show-sectores');
    }

    public function cancelar()
    {
        return redirect()->route('show-sectores');
    }
    public function render()
    {
        return view('livewire.sectores.crear-sector');
    }
}
