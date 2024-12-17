<div>
    <div class="px-4 mt-20">
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

                <x-input id="phone-input" type="tel" class="block mt-5 w-full rounded-xl" wire:model="telefono" placeholder="Ingrese su Telefono" />
                <x-input-error for="telefono" />


                <x-input type="password" class="block mt-5 w-full rounded-xl" wire:model="password"
                    placeholder="Ingrese contraseña" />
                <x-input-error for="password" />
                <x-input type="password" class="block mt-5 w-full rounded-xl" wire:model="passwordConfirmation"
                    placeholder="Confirme su Contraseña" />
                <x-input-error for="passwordConfirmation" />
                <div>
                    <label for="tieneCupon" class="flex justify-center mt-3">¿Tiene un código de cupón?</label>
                    <div class="flex justify-center space-x-4 mt-2">

                        <input type="radio" id="cuponNo" wire:model="tieneCupon" value="no"
                            wire:change="actualizarCodigoCupon('no')" checked>
                        <label for="cuponNo">No</label>

                        <input type="radio" id="cuponSi" wire:model="tieneCupon" value="si"
                            wire:change="actualizarCodigoCupon('si')">
                        <label for="cuponSi">Sí</label>


                    </div>
                </div>

                <!-- Usamos x-show para ocultar el campo cuando tieneCupon es 'no' -->
                <div x-show="$wire.tieneCupon === 'si'" x-transition>
                    <input type="text" class="block mt-5 w-full rounded-xl" wire:model="codigo_cupon"
                        placeholder="Ingrese el código del cupón" :readonly="$tieneCupon === 'no'" />
                    <!-- Solo lectura si 'no' está seleccionado -->
                </div>
                <x-input-error for="codigo_cupon" />

                <div>
                    <div class="flex justify-center space-x-4 mt-2 mb-10">
                        <input type="checkbox" id="acepto" wire:model.live="acepto" value="si" class="form-checkbox">
                        <label for="acepto">Sí, <a href="#"class="underline">acepto los términos y condiciones</a></label>
                    </div>
                </div>

                @if ($acepto === 'si')
                <button type="submit"
                    class="rounded-xl text-white text-lg mb-5 font-bold w-full px-8 py-2 mt-5 bg-gray-900 hover:bg-gray-800 shadow-md hover:text-white">
                    Registrarse
                </button>
            @endif

            </form>
        </div>
    </div>

    @livewire('footer')
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


<script src="https://cdn.jsdelivr.net/npm/cleave.js@1/dist/cleave.min.js"></script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Cleave('#phone-input', {
            delimiters: [' '],
            blocks: [9],
            numericOnly: true,
            phone: true,
            phoneRegionCode: 'CL'
        });
    });
</script>

</div>
