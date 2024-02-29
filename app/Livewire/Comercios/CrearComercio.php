<?php

namespace App\Livewire\Comercios;

use App\Models\Comuna;
use App\Models\Especialidad;
use App\Models\Local;
use App\Models\Sector;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearComercio extends Component
{
    use WithFileUploads;
    public $foto = [];
    public $nombre, $direccion, $imagen, $especialidades_id, $comunas_id, $sectores_id; // input del formularios para Datos local
    public $d1, $d2, $d3, $d4, $d5, $d6, $d7; // input del formularios para losDias
    public $ham1, $ham3, $ham5, $ham7, $ham9, $ham11, $ham13; // input del formularios para los Horas AM
    public $hpm2, $hpm4, $hpm6, $hpm8, $hpm10, $hpm12, $hpm14; // input del formularios para los Horas PM
    public $consumo_minimo,$cerveza;


    public function save()
    {
        $this->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'imagen' => 'required',
            'especialidades_id' => 'required',
            'comunas_id' => 'required',
            'sectores_id' => 'required',
            'consumo_minimo' => 'required',
            'cerveza' => 'required',
            'imagen' => 'required|mimes:jpg,png|max:10240', // Valida que sea un archivo PDF y su tamaño no sea mayor a 5MB
        ]);

        $path = $this->imagen->store('foto', 'public');
        Local::create([
            'nombre' => $this->nombre,
            'direccion' => $this->direccion,
            'especialidades_id' => $this->especialidades_id,
            'comunas_id' => $this->comunas_id,
            'sectores_id' => $this->sectores_id,
            'imagen' => $path,
            'd1' => $this->d1,
            'd2' => $this->d2,
            'd3' => $this->d3,
            'd4' => $this->d4,
            'd5' => $this->d5,
            'd6' => $this->d6,
            'd7' => $this->d7,
            'ham1' => $this->ham1,
            'ham3' => $this->ham3,
            'ham5' => $this->ham5,
            'ham7' => $this->ham7,
            'ham9' => $this->ham9,
            'ham11' => $this->ham11,
            'ham13' => $this->ham13,
            'hpm2' => $this->hpm2,
            'hpm4' => $this->hpm4,
            'hpm6' => $this->hpm6,
            'hpm8' => $this->hpm8,
            'hpm10' => $this->hpm10,
            'hpm12' => $this->hpm12,
            'hpm14' => $this->hpm14,
            'consumo_min' => $this->consumo_minimo,
            'cerveza' => $this->cerveza,

        ]);

        $this->reset(['nombre', 'direccion', 'especialidades_id', 'sectores_id']);
        $this->dispatch('render');
        $this->dispatch('insert', 'El Registro fue Creado Exitosamente');
        return redirect()->route('show-comercio');
    }
    public function render()
    {
        $comunas = Comuna::orderBy('id', 'ASC')->get();
        $sectores = Sector::orderBy('id', 'ASC')->get();
        $especiales = Especialidad::orderBy('id', 'ASC')->get();
        return view('livewire.comercios.crear-comercio', compact('comunas', 'sectores','especiales'));
    }
}
