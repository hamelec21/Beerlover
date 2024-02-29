<?php

namespace App\Livewire\Plan;

use App\Models\Plan;
use Livewire\Component;

class CrearPlan extends Component
{
    public $nombre; // variables publicas del formularios

    public function save()
    {
        $this->validate([
            'nombre' => 'required',

        ]);
        Plan::create([
            'nombre' => $this->nombre,
        ]);

        $this->reset(['nombre']);
        $this->dispatch('render');
        $this->dispatch('insert', 'El Registro fue Creado Exitosamente');
        return redirect()->route('show-planes');
    }

    public function cancelar()
    {
        return redirect()->route('show-planes');
    }
    public function render()
    {
        return view('livewire.plan.crear-plan');
    }
}
