<?php

namespace App\Livewire\Cupone;

use App\Models\Cupon;
use Livewire\Component;

class CrearCupon extends Component
{
    public $nombre; // variables publicas del formularios
    public $codigo;

    public function save()
    {
        $this->validate([
            'nombre' => 'required',
        ]);

        // Obtener las tres palabras del nombre
        $palabras = explode(' ', $this->nombre);
        $codigo = '';

        // Tomar las tres primeras palabras y concatenarlas para generar el código
        for ($i = 0; $i < min(3, count($palabras)); $i++) {
            $codigo .= strtoupper(substr($palabras[$i], 0, 1));
        }

        // Verificar si el código tiene menos de 3 letras, si es así, tomar el nombre completo
        if (strlen($codigo) < 3) {
            $codigo = strtoupper(substr($this->nombre, 0, 3));
        }

        // Generar números aleatorios y agregarlos al código hasta alcanzar 8 caracteres
        $numerosAleatorios = mt_rand(10000000, 99999999); // Número aleatorio de 8 dígitos
        $codigo .= substr($numerosAleatorios, 0, 8 - strlen($codigo));

        Cupon::create([
            'nombre' => $this->nombre,
            'codigo' => $codigo,
        ]);

        $this->reset(['nombre']);
        $this->dispatch('render');
        $this->dispatch('insert', 'El Registro fue Creado Exitosamente');
        return redirect()->route('show-cupones');
    }


    public function cancelar()
    {
        return redirect()->route('show-cupones');
    }

    public function render()
    {
        return view('livewire.cupone.crear-cupon');
    }
}
