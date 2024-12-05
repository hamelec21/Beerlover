<div>
    <nav class="bg-green-600 px-4">
        <div class="flex flex-col lg:flex-row justify-between h-auto lg:h-28 px-4 items-center">
            <!-- Logo Section -->
            <div class="flex justify-center lg:justify-start items-center w-full lg:w-1/4 py-2 lg:py-0 order-1 lg:order-1 mt-2 lg:mt-0">
                <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{ asset('img/logo/logo_beerlover.png') }}" class="h-12 lg:h-20" alt="Logo" />
                </a>
            </div>

            <!-- Search Bar Section -->
            <div class="w-full lg:w-1/2 order-3 lg:order-2 py-2 lg:py-0 mb-5 lg:mb-0 ">
                @livewire('busquedas.buscarhomemenu')
            </div>
            <!-- Buttons Section -->
            <div class="flex justify-center lg:justify-end items-center space-x-4 w-full lg:w-1/4 py-2 lg:py-0 order-2 lg:order-3">
                <a href="/registro">
                    <button class="bg-red-500 rounded-xl px-4 py-1 w-40 lg:w-40">
                        <span class="text-white">Registrarse</span>
                    </button>
                </a>
                <a href="/login">
                <button class="bg-yellow-500 rounded-xl px-4 py-1 w-40 lg:w-40">
                    <span class="text-white">Inicio de Sesión</span>
                </button>
                </a>
            </div>
        </div>
    </nav>
</div>

