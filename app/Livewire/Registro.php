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
    public function registro()
    {
        $this->validate([
            'rut' => 'required',
            'name' => 'required',
            'papellido' => 'required',
            'sapellido' => 'required',
            'codigo_cupon'=>'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|same:passwordConfirmation',
        ]);

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
