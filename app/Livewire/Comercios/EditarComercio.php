<?php

namespace App\Livewire\Comercios;

use App\Models\Comuna;
use App\Models\Especialidad;
use App\Models\Local;
use App\Models\Sector;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class EditarComercio extends Component
{
    use WithFileUploads;
    public $nombre, $direccion, $imagen, $especialidades_id, $comunas_id, $sectores_id; // input del formularios para Datos local
    public $d1, $d2, $d3, $d4, $d5, $d6, $d7; // input del formularios para losDias
    public $ham1, $ham3, $ham5, $ham7, $ham9, $ham11, $ham13; // input del formularios para los Horas AM
    public $hpm2, $hpm4, $hpm6, $hpm8, $hpm10, $hpm12, $hpm14; // input del formularios para los Horas PM
    public $localId; // variablr oculta en formulario
    public $consumo_min,$cerveza;


    public function mount($id)
    {
        $local = Local::find($id);
        if (!$local) {
            return redirect()->route('show-comercio')->with('error', 'Registro de Comuna no encontrado.');
        }
        $this->localId = $local->id;
        $this->nombre = $local->nombre;
        $this->direccion = $local->direccion;
        $this->comunas_id = $local->comunas_id;
        $this->sectores_id = $local->sectores_id;
        $this->especialidades_id = $local->especialidades_id;
        $this->imagen = $local->imagen;
        $this->consumo_min = $local->consumo_min;
        $this->cerveza=$local->cerveza;
        $this->d1 = $local->d1;
        $this->d2 = $local->d2;
        $this->d3 = $local->d3;
        $this->d4 = $local->d4;
        $this->d5 = $local->d5;
        $this->d6 = $local->d6;
        $this->d7 = $local->d7;
        //Hora AM
        $this->ham1 = Carbon::parse($local->ham1)->format('H:i');
        $this->ham3 = Carbon::parse($local->ham3)->format('H:i');
        $this->ham5 = Carbon::parse($local->ham5)->format('H:i');
        $this->ham7 = Carbon::parse($local->ham7)->format('H:i');
        $this->ham9 = Carbon::parse($local->ham9)->format('H:i');
        $this->ham11 = Carbon::parse($local->ham11)->format('H:i');
        $this->ham13 = Carbon::parse($local->ham13)->format('H:i');
        //Hora PM
        $this->hpm2 = Carbon::parse($local->hpm2)->format('H:i');
        $this->hpm4 = Carbon::parse($local->hpm4)->format('H:i');
        $this->hpm6 = Carbon::parse($local->hpm6)->format('H:i');
        $this->hpm8 = Carbon::parse($local->hpm8)->format('H:i');
        $this->hpm10 = Carbon::parse($local->hpm10)->format('H:i');
        $this->hpm12 = Carbon::parse($local->hpm12)->format('H:i');
        $this->hpm14 = Carbon::parse($local->hpm14)->format('H:i');


    }

    public function update()
    {
        $this->validate([
            'nombre' => 'required',
            'direccion' => 'required',

            'especialidades_id' => 'required',
            'comunas_id' => 'required',
            'sectores_id' => 'required',


        ]);

        $local = Local::find($this->localId);

        if (!$local) {
            return redirect()->route('show-comercio')->with('error', 'Registro de Normativa no encontrado.');
        }

        $local->nombre = $this->nombre;
        $local->direccion = $this->direccion;
        $local->comunas_id = $this->comunas_id;
        $local->sectores_id = $this->sectores_id;
        $local->especialidades_id = $this->especialidades_id;
     //   $local->imagen = $this->imagen;
        $local->d1 = $this->d1;
        $local->d2 = $this->d2;
        $local->d3 = $this->d3;
        $local->d4 = $this->d4;
        $local->d5 = $this->d5;
        $local->d6 = $this->d6;
        $local->d7 = $this->d7;
        $local->ham1 = $this->ham1;
        $local->ham3 = $this->ham3;
        $local->ham5 = $this->ham5;
        $local->ham7 = $this->ham7;
        $local->ham9 = $this->ham9;
        $local->ham11 = $this->ham11;
        $local->ham13 = $this->ham13;
        $local->hpm2 = $this->hpm2;
        $local->hpm4 = $this->hpm4;
        $local->hpm6 = $this->hpm6;
        $local->hpm8 = $this->hpm8;
        $local->hpm10 = $this->hpm10 ;
        $local->hpm12 = $this->hpm12;
        $local->hpm14 = $this->hpm14;
        $local->imagen = $this->imagen;
        $local->consumo_min = $this->consumo_min;
        $local->cerveza = $this->cerveza;




        // Actualizar las imágenes solo si se proporcionan nuevas imágenes
        if ($this->imagen) {

            // Verifica si la imagen actual es diferente de la nueva
            if ($this->imagen != $local->imagen) {
                // Elimina la imagen actual
                Storage::delete($local->imagen);
                // Almacena la nueva imagen
                $local->imagen = $this->imagen->store('fotos', 'public');
            }
        }

        $local->save();
        $this->dispatch('editar');
        return redirect()->route('show-comercio');
    }


    public function cancelar()
    {
        return redirect()->route('show-comercio');
    }
    public function render()
    {
        $comunas = Comuna::orderBy('id', 'ASC')->get();
        $sectores = Sector::orderBy('id', 'ASC')->get();
        $especiales = Especialidad::orderBy('id', 'ASC')->get();
        return view('livewire.comercios.editar-comercio', compact('comunas', 'sectores', 'especiales'));
    }
}
