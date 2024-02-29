<?php

namespace App\Livewire\Sectores;

use App\Models\Sector;
use Livewire\Component;

class EditarSector extends Component
{
    public $sectorId; // variablr oculta en formulario
    public $nombre; // variables publicas del formularios

    public function mount($id)
    {
        $sector = Sector::find($id);
        if (!$sector) {
            return redirect()->route('show-sectores')->with('error', 'Registro de Sectores no encontrado.');
        }
        $this->sectorId = $sector->id;
        $this->nombre = $sector->nombre;
    }

    public function update()
    {
        $this->validate([
            'nombre' => 'required',
        ]);
        $sector = Sector::find($this->sectorId);
        if (!$sector) {
            return redirect()->route('show-sectores')->with('error', 'Registro de Sector no encontrado.');
        }
        $sector->nombre = $this->nombre;
        $sector->save();
        $this->dispatch('editar');
        return redirect()->route('show-sectores');
    }

    public function cancelar()
    {
        return redirect()->route('show-sectores');
    }
    public function render()
    {
        return view('livewire.sectores.editar-sector');
    }
}
