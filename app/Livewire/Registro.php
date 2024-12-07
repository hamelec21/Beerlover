<?php
namespace App\Livewire;

use App\Models\Cupon;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Registro extends Component
{
    public $rut;
    public $name;
    public $apellidos;
    public $email;
    public $password;
    public $passwordConfirmation;
    public $isValid = false;
    public $codigo_cupon = 'invitado';
    public $tieneCupon = 'no';
    public $esMayorEdad = null;  // Estado del radio button
    public $acepto='false';



    public function updatedAcepto($value)
    {
        $this->acepto = $value ? 'si' : '';
    }
    public function actualizarCodigoCupon($valor)
    {
        // Actualiza el valor del código del cupón dependiendo de la opción seleccionada
        $this->codigo_cupon = ($valor === 'si') ? '' : 'invitado';
    }


    public function updatedRut()
    {
        $this->isValid = $this->rut ? $this->validarRut($this->rut) : null;
    }

    public function validarRut($rut)
    {
        $rut = preg_replace('/[^k0-9]/i', '', $rut);
        $dv = substr($rut, -1);
        $numero = substr($rut, 0, strlen($rut) - 1);
        $i = 2;
        $suma = 0;
        foreach (array_reverse(str_split($numero)) as $v) {
            if ($i == 8) $i = 2;
            $suma += $v * $i;
            ++$i;
        }
        $dvr = 11 - ($suma % 11);
        if ($dvr == 11) $dvr = 0;
        if ($dvr == 10) $dvr = 'K';
        return $dvr == strtoupper($dv);
    }

    public function registro()
    {
        $this->validate([
            'rut' => 'required',
            'name' => 'required',
            'apellidos' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|same:passwordConfirmation',
            'acepto'=>'required',

        ]);

        if (!$this->validarRut($this->rut)) {
            session()->flash('error', 'El RUT ingresado no es válido.');
            return;
        }

        if ($this->tieneCupon == 'si') {
            $this->validate([
                'codigo_cupon' => 'required',
            ]);

            $cupon = Cupon::where('codigo', $this->codigo_cupon)->first();

            if (!$cupon) {
                session()->flash('error', 'El código del cupón no es válido.');
                return;
            }
        }

        $user = User::create([
            'rut' => $this->rut,
            'name' => $this->name,
            'apellidos' => $this->apellidos,
            'email' => $this->email,
            'usuario_status_id' => 1,
            'plan_id' => 1, // Ajustar el plan según el cupón si es necesario
            'codigo_cupon' => $this->codigo_cupon,
            'password' => Hash::make($this->password),
            'tc'=> $this->acepto,
        ]);

        $user->roles()->sync('2');

        return redirect('mensaje');

        return redirect()->route('socio.home');
    }

    public function render()
    {

        return view('livewire.registro');
    }
}


