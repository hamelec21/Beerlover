<div>
    <div class="px-4 mt-10">
        <div class="container mx-auto w-full lg:w-1/2 px-4 bg-gray-200 border border-gray-300 rounded-lg">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @elseif (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="p-4">
                <h1 class="text-center text-gray-800 font-bold text-lg">Registro</h1>
            </div>
            <form wire:submit.prevent="registro">
                <div>
                    <x-input type="text" wire:model="rut" class="block mt-5 w-full rounded-xl" id="rutInput"
                        placeholder="Ingrese el RUT sin puntos ni guion" />
                    @if ($rut && $isValid === true)
                        <span style="color: green;">Válido</span>
                    @elseif ($rut && $isValid === false)
                        <span style="color: red;">Inválido</span>
                    @endif
                </div>
                <x-input type="text" class="block mt-5 w-full rounded-xl" wire:model="name"
                    placeholder="Ingrese Nombre" />
                <x-input-error for="name" />
                <x-input type="text" class="block mt-5 w-full rounded-xl" wire:model="apellidos"
                    placeholder="Ingrese Apellidos" />
                <x-input-error for="apellidos" />
                <x-input type="email" class="block mt-5 w-full rounded-xl" wire:model="email"
                    placeholder="Ingrese su Correo" />
                <x-input-error for="email" />
                <x-input type="password" class="block mt-5 w-full rounded-xl" wire:model="password"
                    placeholder="Ingrese contraseña" />
                <x-input-error for="password" />
                <x-input type="password" class="block mt-5 w-full rounded-xl" wire:model="passwordConfirmation"
                    placeholder="Confirme su Contraseña" />
                <x-input-error for="passwordConfirmation" />

                <label for="tieneCupon">¿Tiene un código de cupón?</label>
    <div>
        <input type="radio" id="cuponSi" wire:model="tieneCupon" value="si" wire:change="actualizarCodigoCupon('si')">
        <label for="cuponSi">Sí</label>

        <input type="radio" id="cuponNo" wire:model="tieneCupon" value="no" wire:change="actualizarCodigoCupon('no')" checked>
        <label for="cuponNo">No</label>
    </div>

    <!-- Usamos x-show para ocultar el campo cuando tieneCupon es 'no' -->
    <div x-show="$wire.tieneCupon === 'si'" x-transition>
        <input type="text" class="block mt-5 w-full rounded-xl" wire:model="codigo_cupon"
            placeholder="Ingrese el código del cupón"
            :readonly="$tieneCupon === 'no'" />  <!-- Solo lectura si 'no' está seleccionado -->
    </div>

    <x-input-error for="codigo_cupon" />


                <button type="submit"
                    class="rounded-xl text-white text-lg mb-5 font-bold w-full px-8 py-2 mt-5 bg-green-600 hover:bg-green-600 shadow-md hover:text-white">Registrarse</button>
            </form>
        </div>
    </div>





    <script>
        document.getElementById('rutInput').addEventListener('input', function(e) {
            var rut = e.target.value.replace(/\D/g, '');
            if (rut.length > 1) {
                rut = rut.replace(/^(\d{1,2})(\d{0,3})(\d{0,3})(\d{0,1})/, '$1.$2.$3-$4');
            }
            e.target.value = rut;
        });
    </script>

</div>
