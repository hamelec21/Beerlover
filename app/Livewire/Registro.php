<?php

namespace App\Livewire;

use App\Models\Cupon;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Auth;

class Registro extends Component
{
    public $rut;
    public $name;
    public $papellido;
    public $sapellido;
    public $codigo_cupon;
    public $email;
    public $password;
    public $cupon;
    public $passwordConfirmation; // Nueva propiedad
    public $isValid = false;


    public function updatedRut()
    {
        if ($this->rut) {
            $this->isValid = $this->validarRut($this->rut);
        } else {
            $this->isValid = null;
        }
    }

    public function validarRut($rut)
    {
        $rut = preg_replace('/[^k0-9]/i', '', $rut);
        $dv = substr($rut, -1);
        $numero = substr($rut, 0, strlen($rut) - 1);
        $i = 2;
        $suma = 0;
        foreach (array_reverse(str_split($numero)) as $v)
        {
            if ($i == 8)
                $i = 2;
            $suma += $v * $i;
            ++$i;
        }
        $dvr = 11 - ($suma % 11);
        if ($dvr == 11)
            $dvr = 0;
        if ($dvr == 10)
            $dvr = 'K';
        if ($dvr == strtoupper($dv))
            return true;
        else
            return false;
    }

    public function registro()
    {
        $this->validate([
            //'rut' => 'required',
            'name' => 'required',
            'papellido' => 'required',
            'sapellido' => 'required',
            'codigo_cupon'=>'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|same:passwordConfirmation',
        ]);


        // Validación del RUT
    if (!$this->validarRut($this->rut)) {
        // Si el RUT no es válido, redirigir con un mensaje de error
       return redirect()->back()->with('error', 'El RUT ingresado no es válido.');
    }

        // Verificar si el código de cupón existe en la tabla de cupones

        $cupon = Cupon::where('codigo', $this->codigo_cupon)->first();

        if(!$cupon) {
            // Si el código de cupón no existe, redirigir con un mensaje de error
            return redirect()->back()->with('error', 'El código del cupón no es válido.');
        }



        // Si el código de cupón existe, crear el usuario
        $user = User::create([
            'rut' => $this->rut,
            'name' => $this->name,
            'papellido' => $this->papellido,
            'sapellido' => $this->sapellido,
            'email' => $this->email,
            'usuario_status_id' => 1,
            'plan_id' => 1, // Aquí podrías establecer el plan según el cupón
            'codigo_cupon'=>$this->codigo_cupon,
            'password' => Hash::make($this->password),
        ]);

        // Asociar el rol al usuario
        $user->roles()->sync('2');

        // Redireccionar con un mensaje de éxito
        return redirect('mensaje');

        // Si quieres redireccionar al dashboard socio después del registro
        // return redirect()->route('socio.home');
    }









    public function render()
    {
        return view('livewire.registro');
    }
}
