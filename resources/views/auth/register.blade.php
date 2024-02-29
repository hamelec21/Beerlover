<x-guest-layout>
    @include('header')
    <x-validation-errors class="mb-4" />

    <div class="container mx-auto w-full lg:w-1/2 mt-10 px-4">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- inicio de Alerta validacion del rut --}}
            <div id="alerta" class="flex items-center  text-white text-sm font-bold px-4 py-2 " role="alert">
                <span id="mensaje"></span>
            </div>
            {{-- Fin de Alerta validacion del rut --}}

            <div class="mt-4">
                <x-label for="rut" value="{{ __('Rut') }}" />
                <x-input id="rut" class="block mt-1 w-full" type="text" name="rut"
                    onkeypress="return isNumber(event)" {{-- oninput="checkRut(this)"  --}}/>
            </div>

            <div class="mt-4">
                <x-label for="name" value="{{ __('Nombres') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="apellidos" value="{{ __('Apellidos') }}" />
                <x-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos" :value="old('apellidos')"
                    required autofocus autocomplete="apellidos" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Correo') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Contraseña') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4 ">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />
                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' =>
                                        '<a target="_blank" href="' .
                                        route('terms.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Terms of Service') .
                                        '</a>',
                                    'privacy_policy' =>
                                        '<a target="_blank" href="' .
                                        route('policy.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Privacy Policy') .
                                        '</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif
            <div class="flex justify-center mt-10">
                <button
                    class=" text-gray-900 text-lg  font-bold  w-full px-8 py-2 rounded-lg mt-4 bg-yellow-400 hover:bg-green-600 shadow-md  hover:text-white">
                    {{ __('Registrarse') }}
                </button>
            </div>
            <div class="flex items-center justify-center mt-10">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('¿Ya Estas registrado?') }}
                </a>
            </div>

        </form>
    </div>



   <script src="{{ asset('js/validar_rut.js') }}"></script>





</x-guest-layout>
