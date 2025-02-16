<div>
    <div class="bg-green-600 h-auto w-full rounded-border">
        <div class="p-4 container mx-auto">
            <div class="flex items-center mt-1 mb-5">
                <a href="{{route('comercio-asociados')}}" class="mr-4 p-2 bg-gray-300 rounded-full hover:bg-gray-200 ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 text-gray-900">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                    </svg>
                </a>
                <div class="flex-1 text-center">
                    <h1 class="text-white font-bold text-lg mt-3">Nuestros Planes</h1>
                </div>
            </div>

            <!--planes-->
            <div class="mb-5">
                @if ($planes->count())
                    <div>
                        @foreach ($planes as $plan)
                            <div class="flex mb-2">
                                <div
                                    class="bg-white rounded-2xl shadow-lg p-6 w-full border border-gray-200 mt-2 mb-2 relative">
                                    <!-- Tipo Plan -->
                                    <div
                                        class="bg-yellow-400 text-black text-sm font-semibold rounded-full px-3 py-1 absolute -mt-10 left-4">
                                        <span class="uppercase">{{ $plan->tipo_plan }}</span>
                                    </div>
                                    <!-- Icono -->
                                    <div
                                        class="text-sm font-semibold rounded-full px-3 py-1 absolute -mt-10 right-4">
                                        <img src=" {{ Storage::url($plan->imagen) }}" class="w-10">
                                    </div>
                                    <h2 class="text-3xl font-bold mt-4">
                                        ${{ number_format($plan->valor, 0, ',', '.') }}
                                        <span class="text-lg text-gray-500 ml-2">{{ $plan->nombre }}</span>
                                    </h2>
                                    <p class="text-gray-500 text-sm mt-1 text-justify">
                                        {!! $plan->descripcion !!}
                                    </p>
                                    <div
                                        class="py-2.5 mt-2 bg-black text-white rounded-lg text-sm font-semibold hover:bg-gray-800 flex justify-center items-center px-4">
                                        <input type="radio" name="plan" wire:model.live="planSeleccionado" value="{{ $plan->id }}" class="mr-2 text-yellow-400 border-gray-300 focus:ring-yellow-500 focus:ring-2 rounded-full">
                                        <span class="text-sm font-semibold">Elegir Plan →</span>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                @endif

            </div>
        </div>
    </div>

    <div class="h-[800px]">
        <h1 class="text-center text-gray-900 font-bold text-lg mt-3">Registro</h1>
        <!--mensaje--->
        <div class="container mx-auto">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @elseif (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <div class="container mx-auto">
            <div class="p-8">

                <!--Rut-->
                <div class="relative w-full">
                    <input wire:model="rut" id="rut" name="rut" type="text" required
                        placeholder="Ingrese rut sin punto y guion"
                        class="mt-1 block w-full px-3 py-2 pr-10 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-300 sm:text-sm
                        @if ($rut && $isValid !== null) {{ $isValid ? 'border-green-500' : 'border-red-500' }} @endif"
                        oninput="formatearRUT(this)" value="{{ old('rut') }}">

                    @if ($rut && $isValid !== null)
                        <span class="absolute inset-y-0 right-3 flex items-center text-lg">
                            @if ($isValid)
                                ✅
                            @else
                                ❌
                            @endif
                        </span>
                    @endif

                    @error('rut')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>


                <!--Nombre-->
                <div>
                    <x-input type="text" class="block mt-3 w-full rounded-xl" wire:model="name"
                        placeholder="Ingrese Nombre" />
                    <x-input-error for="name" />
                </div>
                <!--Apellidos-->
                <x-input type="text" class="block mt-3 w-full rounded-xl" wire:model="apellidos"
                    placeholder="Ingrese Apellidos" />
                <x-input-error for="apellidos" />
                <!--Email-->
                <x-input type="email" class="block mt-3 w-full rounded-xl" wire:model="email"
                    placeholder="Ingrese su Correo" />
                <x-input-error for="email" />
                <!--Telefono-->
                <x-input id="phone-input" type="tel" class="block mt-3 w-full rounded-xl" wire:model="telefono"
                    placeholder="Ingrese su Teléfono" />
                <x-input-error for="telefono" />
                <!--Password-->
                <x-input type="password" class="block mt-3 w-full rounded-xl" wire:model="password"
                    placeholder="Ingrese contraseña" />
                <x-input-error for="password" />
                <!--Confirmar Password-->
                <x-input type="password" class="block mt-3 w-full rounded-xl" wire:model="passwordConfirmation"
                    placeholder="Confirme su Contraseña" />
                <x-input-error for="passwordConfirmation" />

                <!--¿Tiene un código de cupón?-->
                <div>
                    <label for="tieneCupon" class="flex justify-center mt-3 font-bold">¿Tiene un código de
                        cupón?</label>
                    <div class="flex justify-center space-x-4 mt-2">
                        <input type="radio" id="cuponNo" wire:model="tieneCupon" value="no"
                            wire:change="actualizarCodigoCupon('no')" checked>
                        <label for="cuponNo">No</label>

                        <input type="radio" id="cuponSi" wire:model="tieneCupon" value="si"
                            wire:change="actualizarCodigoCupon('si')">
                        <label for="cuponSi">Sí</label>
                    </div>
                </div>
                <!--Campo para ingresar Codigo-->
                <div x-show="$wire.tieneCupon === 'si'" x-transition>
                    <input type="text" class="block mt-5 w-full rounded-xl" wire:model="codigo_cupon"
                        placeholder="Ingrese el código del cupón" :readonly="$tieneCupon === 'no'" />
                    <x-input-error for="codigo_cupon" />
                </div>
                <!--Termino y Condiciones-->
                <div>
                    <div class="flex justify-center space-x-4 mt-2 mb-8">
                        <input type="checkbox" id="acepto" wire:model.live="acepto" value="si"
                            class="form-checkbox">
                        <label for="acepto">Sí, <a href="/terminos-y-condiciones" class="underline">acepto los
                                términos y condiciones</a></label>
                    </div>
                </div>

                <!--Boton-->
                @if ($acepto === 'si')
                    <button wire:click="registro"
                        class="rounded-xl text-white text-lg mb-5 font-bold w-full px-8 py-2 mt-5 bg-gray-900 hover:bg-gray-800 shadow-md hover:text-white">
                        Registrarse
                    </button>
                @endif

            </div>
        </div>
    </div>

    @livewire('footer')

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
