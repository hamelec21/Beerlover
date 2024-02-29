<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;


class Registro extends Component
{
    public $rut;
    public $name;
    public $apellidos;
    public $email;
    public $password;
    public $passwordConfirmation; // Nueva propiedad
    public function registro()
    {
        $this->validate([
            'rut' => 'required',
            'name' => 'required',
            'apellidos' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|same:passwordConfirmation', // Validar que las contraseñas sean iguales
        ]);

        $user = User::create([
            'rut' => $this->rut,
            'name' => $this->name,
            'apellidos' => $this->apellidos,
            'email' => $this->email,
            'usuario_status_id' => 1,
            'password' => Hash::make($this->password),
        ]);
        $user->roles()->sync('2');
        // Puedes redirigir a una página de inicio de sesión u otra después del registro
         return redirect('/login');
        // Redireccionar al dashboard socio
        // return redirect()->route('socio.home');
    }

    public function render()
    {
        return view('livewire.registro');
    }
}
