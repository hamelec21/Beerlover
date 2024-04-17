<div>
    @include('header_front')

    {{-- Fin de Alerta validacion del rut --}}
    <div class="container mx-auto w-full lg:w-1/2 mt-10 px-4">
        @if (session('error'))
            <div class="alert alert-danger ">
                {{ session('error') }}
            </div>
        @endif


        <form wire:submit.prevent="registro">

            <div>
                <label for="name">Rut</label>
                <x-input type="text" wire:model="rut" class="block mt-1 w-full"  id="rutInput" placeholder="Ingrese el RUT sin puntos ni guion "/>

                @if ($rut && $isValid === true)
                    <span style="color: green;">Válido</span>
                @elseif ($rut && $isValid === false)
                    <span style="color: red;">Inválido</span>
                @endif
            </div>



            <label for="name">Nombres</label>
            <x-input type="text" class="block mt-1 w-full" wire:model="name" />
            <x-input-error for="name" />

            <label for="name">Primer Apellido</label>
            <x-input type="text" class="block mt-1 w-full" wire:model="papellido" />
            <x-input-error for="Primer Apellido" />

            <label for="name">Segundo Apellido:</label>
            <x-input type="text" class="block mt-1 w-full" wire:model="sapellido" />
            <x-input-error for="Segundo Apellido" />

            <label for="email">Correo electrónico</label>
            <x-input type="email" class="block mt-1 w-full" wire:model="email" />
            <x-input-error for="email" />

            <label for="password">Contraseña</label>
            <x-input type="password" class="block mt-1 w-full" wire:model="password" />
            <x-input-error for="password" />

            <label for="passwordConfirmation">Confirmar Contraseña</label>
            <x-input type="password" class="block mt-1 w-full" wire:model="passwordConfirmation" />
            <x-input-error for="passwordConfirmation" />

            <label for="name">Código de Cupón (Si no dispone de un código, ingrese como <b>invitado</b>)</label>
            <x-input type="text" class="block mt-1 w-full" wire:model="codigo_cupon" />
            <x-input-error for="codigo_cupon" />

            <button type="submit"
                class="text-gray-900 text-lg  font-bold  w-full px-8 py-2 rounded-lg mt-4 bg-yellow-400 hover:bg-green-600 shadow-md hover:text-white">Registrarse</button>
        </form>
    </div>

    <script>
        document.getElementById('rutInput').addEventListener('input', function (e) {
            var rut = e.target.value.replace(/\D/g, '');
            if (rut.length > 1) {
                rut = rut.replace(/^(\d{1,2})(\d{0,3})(\d{0,3})(\d{0,1})/, '$1.$2.$3-$4');
            }
            e.target.value = rut;
        });
    </script>


</div>
