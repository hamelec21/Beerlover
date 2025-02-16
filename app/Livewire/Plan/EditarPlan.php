<?php

namespace App\Livewire\Plan;

use App\Models\Plan;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarPlan extends Component
{
    public $planId; // variaable oculta en formulario
    public $nombre,$descripcion,$valor,$imagen,$is_active,$tipo_plan; // variables publicas del formularios
    use WithFileUploads;

    public function mount($id)
    {
        $plan =Plan::find($id);
        if (!$plan) {
            return redirect()->route('show-planes')->with('error', 'Registro de tipo Suscripcion no encontrado.');
        }
        $this->planId = $plan->id;
        $this->nombre = $plan->nombre;
        $this->descripcion = $plan->descripcion;
        $this->tipo_plan = $plan->tipo_plan;
        $this->valor = $plan->valor;
        $this->imagen = $plan->imagen;
        $this->is_active = (bool) $plan->is_active; // Asegura que es un valor booleano

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
        $plan->descripcion = $this->descripcion;
        $plan->tipo_plan = $this->tipo_plan;
        $plan->valor = $this->valor;
        $plan->is_active = $this->is_active;


  // Actualizar las imágenes solo si se proporcionan nuevas imágenes
  if ($this->imagen) {
    // Verifica si la imagen actual es diferente de la nueva
    if ($this->imagen != $plan->imagen) {
        // Elimina la imagen actual
        Storage::delete($plan->imagen);

        // Almacena la nueva imagen
        $plan->imagen =  $this->imagen->store('public/plan');

    }
}


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
