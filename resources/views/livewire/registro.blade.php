
<div>
    @include('header_front')

    {{-- inicio de Alerta validacion del rut --}}
    <div id="alerta" class="flex items-center  text-white text-sm font-bold px-4 py-2 " role="alert">
        <span id="mensaje"></span>
    </div>
    {{-- inicio de Alerta validacion del rut --}}
    <div id="alerta" class="flex items-center  text-white text-sm font-bold px-4 py-2 " role="alert">
        <span id="mensaje"></span>
    </div>
    {{-- Fin de Alerta validacion del rut --}}

    <div class="container mx-auto w-full lg:w-1/2 mt-10 px-4">
        <form wire:submit.prevent="registro">
            <label for="name">Rut:</label>
            <x-input type="text" id="rut" onkeypress="return isNumber(event)" {{-- oninput="checkRut(this)" --}} class="block mt-1 w-full" wire:model.defer="rut" onkeypress="return isNumber(event)" placeholder="12.555.444-4"/>
            <x-input-error for="rut" />



            <label for="name">Nombres:</label>
            <x-input type="text" class="block mt-1 w-full" wire:model="name" />
            <x-input-error for="name" />

            <label for="name">Primer Apellido:</label>
            <x-input type="text" class="block mt-1 w-full" wire:model="papellido" />
            <x-input-error for="Primer Apellido" />

            <label for="name">Segundo Apellido:</label>
            <x-input type="text" class="block mt-1 w-full" wire:model="sapellido" />
            <x-input-error for="Segundo Apellido" />

            <label for="email">Correo electrónico:</label>
            <x-input type="email" class="block mt-1 w-full" wire:model="email" />
            <x-input-error for="email" />

            <label for="password">Contraseña:</label>
            <x-input type="password" class="block mt-1 w-full" wire:model="password" />
            <x-input-error for="password" />

            <label for="passwordConfirmation">Confirmar Contraseña:</label>
            <x-input type="password" class="block mt-1 w-full" wire:model="passwordConfirmation" />
            <x-input-error for="passwordConfirmation" />

            <label for="name">Codigo Cupon:</label>
            <x-input type="text" class="block mt-1 w-full" wire:model="codigo_cupon" />
            <x-input-error for="codigo_cupon" />

            <button type="submit" class="text-gray-900 text-lg  font-bold  w-full px-8 py-2 rounded-lg mt-4 bg-yellow-400 hover:bg-green-600 shadow-md hover:text-white">Registrarse</button>
        </form>
    </div>



    <script src="{{ asset('js/validar_rut.js') }}"></script>


</div>

