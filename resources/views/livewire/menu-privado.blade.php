<div>
    <nav class="bg-green-600 px-2 lg:px-4">
        <div class="flex justify-between items-center h-20">
            <!--logo-->
            <div class="flex justify-start items-center lg:mt-8">
                <a href="/" class="flex items-center">
                    <img src="{{ asset('img/logo/logo_beerlover.png') }}" class="h-12 lg:h-20" alt="Logo" />
                </a>
            </div>
            <!--bienvenidos-->
            <div class="flex justify-center items-center lg:mt-8">
                @auth
                <span class="text-white text-lg">
                    Salud {{ Auth::user()->first_name }}
                </span>
            @endauth
            @guest
            @endguest
            </div>
            <!--boton cerrar session-->
            <div class="flex justify-end lg:mt-8">
                    <button  wire:click="logout"  class="bg-red-600 rounded-xl px-4 py-1 w-25">
                        <span class="text-white">Cerrar Sesión</span>
                    </button>

            </div>
        </div>

        <div class="w-full lg:w-1/2 mx-auto">
            <div class="pb-5">
                @livewire('busquedas.buscarhomemenusocio')
            </div>
        </div>
    </nav>

</div>
