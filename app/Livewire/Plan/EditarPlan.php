<?php

namespace App\Livewire\Plan;

use App\Models\Plan;
use Livewire\Component;

class EditarPlan extends Component
{
    public $planId; // variaable oculta en formulario
    public $nombre; // variables publicas del formularios

    public function mount($id)
    {
        $plan =Plan::find($id);
        if (!$plan) {
            return redirect()->route('show-planes')->with('error', 'Registro de tipo Suscripcion no encontrado.');
        }
        $this->planId = $plan->id;
        $this->nombre = $plan->nombre;
    }

    public function update()
    {
        $this->validate([
            'nombre' => 'required',
        ]);
        $plan =Plan::find($this->planId);
        if (!$plan) {
            return redirect()->route('show-planes')->with('error', 'Registro de tipo Suscripcion no encontrado.');
        }
        $plan->nombre = $this->nombre;
        $plan->save();
        $this->dispatch('editar');
        return redirect()->route('show-planes');
    }

    public function cancelar()
    {
        return redirect()->route('show-planes');
    }
    public function render()
    {
        return view('livewire.plan.editar-plan');
    }
}
