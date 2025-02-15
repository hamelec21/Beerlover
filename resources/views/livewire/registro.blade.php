<div>
    <div class="px-4 mt-3 lg:mt-10">
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

            <div class="p-2">
                <h1 class="text-center text-gray-800 font-bold text-lg">Registro</h1>
            </div>
            <form wire:submit.prevent="registro">
                <div>
                    <label for="rut" class="block text-sm font-medium text-gray-700">RUT</label>
                    <div class="relative">
                        <input wire:model="rut" id="rut" name="rut" type="text"
                            required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm
                            @if($rut && $isValid !== null) {{ $isValid ? 'border-green-500' : 'border-red-500' }} @endif"
                            oninput="formatearRUT(this)"
                            value="{{ old('rut') }}">

                        @if($rut && $isValid !== null) {{-- Solo muestra el ícono si hay un valor en el input --}}
                            <span class="absolute right-3 top-2 text-lg">
                                @if($isValid)
                                    ✅
                                @else
                                    ❌
                                @endif
                            </span>
                        @endif
                    </div>
                    @error('rut')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-xs text-gray-500">Formato: 12.543.876-5</p>
                </div>
                <x-input type="text" class="block mt-3 w-full rounded-xl" wire:model="name"
                    placeholder="Ingrese Nombre" />
                <x-input-error for="name" />
                
                <x-input type="text" class="block mt-3 w-full rounded-xl" wire:model="apellidos"
                    placeholder="Ingrese Apellidos" />
                <x-input-error for="apellidos" />

                <x-input type="email" class="block mt-3 w-full rounded-xl" wire:model="email"
                    placeholder="Ingrese su Correo" />
                <x-input-error for="email" />

                <x-input id="phone-input" type="tel" class="block mt-3 w-full rounded-xl" wire:model="telefono"
                    placeholder="Ingrese su Telefono" />
                <x-input-error for="telefono" />


                <x-input type="password" class="block mt-3 w-full rounded-xl" wire:model="password"
                    placeholder="Ingrese contraseña" />
                <x-input-error for="password" />
                <x-input type="password" class="block mt-3 w-full rounded-xl" wire:model="passwordConfirmation"
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
                        <input type="checkbox" id="acepto" wire:model.live="acepto" value="si"
                            class="form-checkbox">
                        <label for="acepto">Sí, <a href="/terminos-y-condiciones"class="underline">acepto los términos
                                y condiciones</a></label>
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
    function formatearRUT(input) {
        // Eliminar caracteres no válidos
        let rut = input.value.replace(/[^\dKk]/g, ''); // Eliminar todo lo que no sea número o "K"/"k"

        if (rut.length > 1) {
            // Separar el dígito verificador
            const dv = rut.slice(-1); // Último carácter como dígito verificador
            const number = rut.slice(0, -1); // Todo menos el último carácter

            // Formatear el número con puntos según su longitud
            let formattedNumber = '';
            if (number.length > 6) {
                formattedNumber = number.replace(/^(\d{1,2})(\d{3})(\d{3})$/, '$1.$2.$3');
            } else if (number.length > 3) {
                formattedNumber = number.replace(/^(\d{1,3})(\d{3})$/, '$1.$2');
            } else {
                formattedNumber = number; // Sin puntos si tiene menos de 4 dígitos
            }

            // Juntar el número formateado con el dígito verificador
            rut = `${formattedNumber}-${dv.toUpperCase()}`;

            // Verificar que el RUT no tenga todos los dígitos iguales
            if (/^(\d)\1+$/.test(rut)) {
                alert("El RUT no puede tener todos los dígitos iguales (Ej: 11.111.111-1).");
                input.value = '';
                return;
            }

            // Asignar el valor formateado al campo
            input.value = rut;
        }
    }
</script>




<script src="https://cdn.jsdelivr.net/npm/cleave.js@1/dist/cleave.min.js"></script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
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
