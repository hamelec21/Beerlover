<?php

namespace App\Livewire\Mesero\Registro;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use SimpleSoftwareIO\QrCode\Facades\QrCode;


class CrearMesero extends Component
{
    public $rut;
    public $name;
    public $apellidos;
    public $email;
    public $password;
    public $codigo;
    public $qrCodeUrl;
    public $passwordConfirmation; // Nueva propiedad

    public function registro_mesero()
    {
        $this->validate([
            'rut' => 'required',
            'name' => 'required',
            'apellidos' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|same:passwordConfirmation', // Validar que las contraseñas sean iguales
        ]);
        $codigo = 'mes' . strtoupper(substr(md5(uniqid(rand(), true)), 0, 7));
        // Generar un código QR único con el ID del usuario
        $this->qrCodeUrl = route('q-r-login', ['email' => $this->email]);
        $qrCode = QrCode::format('png')->size(200)->generate($this->qrCodeUrl);
       // dd($qrCode);
        // Obtener la representación Base64 del código QR
       // $qrBase64 = base64_encode($qrCode);
        $qrBase64 = "data:image/png;base64," . base64_encode($qrCode);

        $user = User::create([
            'rut' => $this->rut,
            'name' => $this->name,
            'apellidos' => $this->apellidos,
            'email' => $this->email,
            'usuario_status_id' => 1,
            'password' => Hash::make($this->password),
            'customerId' => $codigo,
            'qr_code' => $qrBase64,
        ]);

        //   $user->assignRole('SOCIO'); // Asignar el rol "publico"
        $user->roles()->sync('3');

        $this->reset(['rut','name','apellidos','email','password','codigo']);
        $this->dispatch('render');
        $this->dispatch('insert', 'El Registro fue Creado Exitosamente');
        return redirect()->route('show-mesero');
    }

    public function cancelar()
    {
        return redirect()->route('show-mesero');
    }

    public function render()
    {
        return view('livewire.mesero.registro.crear-mesero');
    }
}
