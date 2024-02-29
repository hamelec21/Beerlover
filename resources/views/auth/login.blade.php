<x-guest-layout>
    <!--logo-->
    @include('header_front')
    <div class="container mx-auto text-center mt-10 px-10 ">
        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <!--formulario-->
        <div class="container mx-auto w-full lg:w-1/2 mt-10">
            <form  method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <input id="email" class="py-2 mt-1 rounded-lg w-full px-4 text-gray-800" type="email"
                        name="email" :value="old('email')" required autofocus placeholder="Email" />
                </div>
                <div class="mt-4">
                    <input id="password" class="py-2 mt-1 rounded-lg w-full px-4 text-gray-800" type="password"
                        name="password" required autocomplete="current-password" placeholder="Password" />
                </div>
                <div class="text-right text-xs mt-2 text-white">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                            href="{{ route('password.request') }}">
                            <div class="text-right text-xs mt-2 text-gray-900">Recuperar Contraseña?</div>
                        </a>
                    @endif
                </div>
                <button
                    class=" text-white text-lg  font-bold  w-full px-8 py-2 rounded-lg mt-4 bg-green-700 hover:bg-green-600 ">
                    {{ __('Acceder') }}
                </button>
                <br>

                <button
                    class=" text-gray-900 text-lg  font-bold  w-full px-8 py-2 rounded-lg mt-4 bg-yellow-400 hover:bg-yellow-500 shadow-md hover:text-gray-900 ">
                    <a href="{{ route('registro') }}">

                        {{ __(' Crear Cuenta') }}
                    </a>
                </button>
            </form>
        </div>
    </div>









</x-guest-layout>
