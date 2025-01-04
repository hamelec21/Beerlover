<div>
<nav class="bg-green-600 px-2 lg:px-4">
    <div class="flex justify-between items-center h-20">
        <!--logo-->
        <div class="flex justify-start items-center lg:mt-8">
            <a href="/" class="flex items-center">
                <img src="{{ asset('img/logo/logo_beerlover.png') }}" class="h-12 lg:h-20" alt="Logo" />
            </a>
        </div>
        <!--boton cerrar session-->

        <div class="flex justify-end lg:mt-8 space-x-4">
            <a href="/registro">
                <button class="bg-gray-900 rounded-xl px-4 py-1 w-25">
                    <span class="text-white">Registrarse</span>
                </button>
            </a>

            <a href="/login">
                <button class="bg-yellow-400 rounded-xl px-4 py-1 w-25">
                    <span class="text-gray-900">Iniciar Sesión</span>
                </button>
            </a>
        </div>


    </div>

    <div class="w-full lg:w-1/2 mx-auto">
        <div class="pb-5">
            @livewire('busquedas.buscarhomemenu')
        </div>
    </div>
</nav>
</div>
