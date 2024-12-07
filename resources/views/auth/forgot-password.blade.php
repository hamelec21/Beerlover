<x-guest-layout>

    <!--logo-->
    @include('header_front')

    <div class="container mx-auto w-full lg:w-1/2 mt-10">
        <div class="mb-4 text-sm text-gray-600">
            <p class="text-justify px-4 text-lg font-semibold">¿Olvidaste tu contraseña? Ningún problema. Simplemente
                háganos saber su dirección de correo electrónico y le enviaremos un enlace para restablecer su
                contraseña que le permitirá elegir una nueva.'</p>
        </div>
    </div>


    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <x-validation-errors class="mb-4" />

    <div class="container mx-auto text-center mt-10 px-10 ">
        <div class="container mx-auto w-full lg:w-1/2 mt-10">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="block">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autofocus autocomplete="username" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button>
                        {{ __('Enlace para restablecer contraseña') }}
                    </x-button>
                </div>
            </form>
        </div>

    </div>
    @livewire('footer')









</x-guest-layout>
