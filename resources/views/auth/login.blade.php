<x-guest-layout>
    {{--

    <div class="container mx-auto text-center mt-10 px-10 ">
        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif


        <!--formulario-->
        <div class="container mx-auto w-full lg:w-1/2">
            <form  method="POST" action="{{ route('login') }}" ">
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

    --}}

    @livewire('menu-segundario')
    <div class="px-4 mt-14">
        <div class="flex flex-col justify-center bg-gray-200 relative ">
            <div class="absolute top-[-32px] left-1/2 transform -translate-x-1/2">
                <svg class="fill-gray-600" width="64" height="64" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 3c1.652 0 3 1.348 3 3s-1.348 3-3 3-3-1.348-3-3 1.348-3 3-3zm0 15c-2.484 0-4.675-1.1-6.162-2.829 0.031-1.98 4-3.071 6.162-3.071 2.162 0 6.131 1.091 6.162 3.071C16.675 18.9 14.484 20 12 20z" />
                </svg>
            </div>

            <h1 class="mt-10 text-center text-gray-800 font-bold text-lg">Bienvenidos</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mt-4 px-4">
                    <div class="relative flex items-center">
                        <input type="email" id="email"
                            class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-green-500 focus:border-green-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5 "
                            name="email" :value="old('email')" required autofocus placeholder="Email">
                        <span class="absolute inset-y-0 right-0 flex items-center px-4  bg-gray-600 border-l border-gray-300 rounded-r-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-200">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9v.906a2.25 2.25 0 0 1-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 0 0 1.183 1.981l6.478 3.488m8.839 2.51-4.66-2.51m0 0-1.023-.55a2.25 2.25 0 0 0-2.134 0l-1.022.55m0 0-4.661 2.51m16.5 1.615a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V8.844a2.25 2.25 0 0 1 1.183-1.981l7.5-4.039a2.25 2.25 0 0 1 2.134 0l7.5 4.039a2.25 2.25 0 0 1 1.183 1.98V19.5Z" />
                              </svg>


                        </span>
                    </div>
                </div>

                <div class="mt-4 px-4">
                    <div class="relative flex items-center">
                        <input type="password" id="password"
                            class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-green-500 focus:border-green-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5 "
                            name="password" required autocomplete="current-password" placeholder="Password">
                        <span class="absolute inset-y-0 right-0 flex items-center px-4 bg-gray-200 border-l border-gray-300 rounded-r-lg dark:bg-gray-600 dark:border-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-200">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                              </svg>
                        </span>
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
                    <button
                    class="text-white text-lg font-bold w-full px-8 py-2  mt-4 bg-gray-900 hover:bg-gray-800">
                    {{ __('Iniciar Sesión') }}
                </button>
                </div>

                <br>

                <div class="bg-gray-100 mt-5">
                    <button
                    class="text-gray-900 text-md font-bold w-full px-8 py-2 rounded-lg mt-4 ">
                    <a href="{{ route('registro') }}">
                        {{ __('Crear Cuenta') }}
                    </a>
                </button>
                </div>


            </form>
        </div>
    </div>


</x-guest-layout>
