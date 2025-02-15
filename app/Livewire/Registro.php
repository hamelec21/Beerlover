<?php
namespace App\Livewire;

use App\Models\Cupon;
use Livewire\Component;
use App\Models\User;
use App\Rules\ValidRut;
use App\Rules\ChileanPhone;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use App\Mail\NuevoUsuarioRegistrado;

class Registro extends Component
{
    public $rut;
    public $name;
    public $apellidos;
    public $email;
    public $telefono;
    public $password;
    public $passwordConfirmation;
    public $isValid = false;
    public $codigo_cupon = 'invitado';
    public $tieneCupon = 'no';
    public $acepto = 'false';

    public function updatedAcepto($value)
    {
        $this->acepto = $value ? 'si' : '';
    }

    public function actualizarCodigoCupon($valor)
    {
        $this->codigo_cupon = ($valor === 'si') ? '' : 'invitado';
    }




    public function updatedRut()
    {
        $this->rut = strtoupper($this->rut); // Convertir a mayúsculas
        $this->isValid = $this->rut ? $this->validarRut($this->rut) : null;

        // Mensaje de error en tiempo real si el RUT no es válido
        if ($this->isValid === false) {
            $this->addError('rut', 'El RUT ingresado no es válido.');
        } else {
            $this->resetErrorBag('rut'); // Limpiar el error si el RUT es válido
        }
    }


    public function validarRut($rut)
    {
        // Remover puntos y espacios, pero mantener el guion
        $rut = str_replace('.', '', $rut);

        if (!preg_match('/^(\d{7,9})-([\dkK])$/', $rut, $matches)) {
            return false;
        }

        $numero = $matches[1];
        $dvIngresado = strtoupper($matches[2]);

        $suma = 0;
        $factor = 2;

        for ($i = strlen($numero) - 1; $i >= 0; $i--) {
            $suma += $numero[$i] * $factor;
            $factor = $factor == 7 ? 2 : $factor + 1;
        }

        $dvrCalculado = 11 - ($suma % 11);
        if ($dvrCalculado == 11) {
            $dvrCalculado = '0';
        } elseif ($dvrCalculado == 10) {
            $dvrCalculado = 'K';
        } else {
            $dvrCalculado = (string) $dvrCalculado;
        }

        return $dvrCalculado === $dvIngresado;
    }

    public function registro()
    {
        $this->validate([
            'rut' => ['required', 'string', 'max:12', new ValidRut, 'unique:users,rut'],
            'name' => 'required',
            'apellidos' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|same:passwordConfirmation',
            'acepto' => 'required',
            'telefono' => ['required', new ChileanPhone],
        ]);

        if (!$this->validarRut($this->rut)) {
            throw ValidationException::withMessages(['rut' => 'El RUT ingresado no es válido.']);
        }

        if ($this->tieneCupon == 'si') {
            $this->validate([
                'codigo_cupon' => 'required',
            ]);

            if (!Cupon::where('codigo', $this->codigo_cupon)->exists()) {
                throw ValidationException::withMessages(['codigo_cupon' => 'El código del cupón no es válido.']);
            }
        }

        // Crear usuario
        $user = User::create([
            'rut' => str_replace('.', '', strtoupper($this->rut)),
            'name' => $this->name,
            'apellidos' => $this->apellidos,
            'email' => $this->email,
            'phone' => $this->telefono,
            'usuario_status_id' => 1,
            'plan_id' => 1,
            'codigo_cupon' => $this->codigo_cupon,
            'password' => Hash::make($this->password),
            'tc' => $this->acepto,
        ]);

        $user->roles()->sync([2]);

        Mail::to('no-responder@beerlover.cl')->send(new NuevoUsuarioRegistrado($user));

        return redirect()->route('socio.home');
    }

    public function render()
    {
        return view('livewire.registro');
    }
}
