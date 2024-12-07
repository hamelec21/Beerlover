<x-guest-layout>

    <div class="px-4 -mt-14 lg:mt-14 container mx-auto w-full lg:w-1/2 min-h-screen flex items-center justify-center ">
        <div class="flex flex-col justify-center bg-gray-200 relative w-full   border border-gray-300 rounded-lg">
            <div class="absolute top-[-50px] left-1/2 transform -translate-x-1/2">
                <img src="{{asset('img/logo/vaso.png') }}" class="w-20">
            </div>

            <h1 class="mt-10 text-center text-gray-800 font-bold text-lg">Bienvenidos</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mt-4 px-4">
                    <div class="relative flex items-center">
                        <input type="email" id="email"
                            class="rounded-xl bg-gray-50 border text-gray-900 focus:ring-green-500 focus:border-green-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5 "
                            name="email" :value="old('email')" required autofocus placeholder="Email">
                    </div>
                </div>

                <div class="mt-4 px-4">
                    <div class="relative flex items-center">
                        <input type="password" id="password"
                            class="rounded-xl bg-gray-50 border text-gray-900 focus:ring-green-500 focus:border-green-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5 "
                            name="password" required autocomplete="current-password" placeholder="Password">

                    </div>
                </div>

                <div class="text-right text-xs mt-2 text-white px-8">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                            href="{{ route('password.request') }}">
                            <div class="text-right text-xs mt-2 text-gray-900">Recuperar Contraseña?</div>
                        </a>
                    @endif
                </div>

                <div class="px-4">
                    <button class=" rounded-xl text-white text-lg font-bold w-full px-8 py-2  mt-4 bg-gray-900 hover:bg-gray-800">
                        {{ __('Iniciar Sesión') }}
                    </button>
                </div>
            </form>

            <div class="mt-2 px-4 mb-5">
                <button class=" rounded-xl text-gray-900 bg-white text-md font-bold w-full px-8 py-2  mt-4 border border-gray-300 ">
                    <a href="{{ route('registro') }}">
                        {{ __('Crear Cuenta') }}
                    </a>
                </button>
            </div>
        </div>


    </div>

    @livewire('footer')

</x-guest-layout>
