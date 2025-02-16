<?php

namespace App\Livewire\Plan;

use App\Models\Plan;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearPlan extends Component
{
    public $nombre,$descripcion,$valor,$imagen,$is_active,$tipo_plan; // variables publicas del formularios
    use WithFileUploads;



    public function save()
    {
        $this->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'tipo_plan' => 'required',
            'valor' => 'required',
            'imagen' => 'required|mimes:jpg,png|max:10240',
            'is_active' => 'required',
        ]);

        $path = $this->imagen->store('public/plan');

        Plan::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'tipo_plan' => $this->tipo_plan,
            'valor' => $this->valor,
            'imagen' => $path,
            'is_active' => $this->is_active,
        ]);

        $this->reset(['nombre','descripcion','valor','imagen','is_active','tipo_plan']);
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
