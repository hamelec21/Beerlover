<div>
    <aside
        class="ml-[-100%] fixed z-10 top-0 pb-3 px-6 w-full flex flex-col justify-between h-screen  bg-gray-100 transition duration-300 md:w-4/12 lg:ml-0 lg:w-[25%] xl:w-[20%] 2xl:w-[15%] overflow-y-auto">
        <div class="flex-row justify-center">
            <a href="#" target="_blank">
                <div class="flex-row mt-5 ">
                    <img src="{{ asset('img/logo/logo_beerlover.png') }}" class="w-28">
                </div>
            </a>
            <ul class="space-y-2 tracking-wide mt-8">

                <li>
                    <a href="/dashboard" aria-label="dashboard"
                        class="relative px-4 py-1 flex items-center space-x-4 rounded-xl text-white bg-gray-900">
                        <i class="fas fa-th"></i>
                        <span class="-mr-1 font-medium">Menu</span>
                    </a>
                </li>
                <li>
                    <a href="/dashboard" class="px-4 py-1 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <i class="fas fa-chevron-circle-right text-gray-600 group-hover:text-yellow-600"></i>
                        <span class=" text-gray-600 group-hover:text-yellow-600 ">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('show-suscritos') }}"
                        class="px-4 py-1 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <i class="fas fa-chevron-circle-right text-gray-600 group-hover:text-yellow-600"></i>
                        <span class=" text-gray-600 group-hover:text-yellow-600 ">Modulo Suscripciones</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('ticket.show-tickets') }}"
                        class="px-4 py-1 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <i class="fas fa-chevron-circle-right text-gray-600 group-hover:text-yellow-600"></i>
                        <span class=" text-gray-600 group-hover:text-yellow-600 ">Modulo Tickets</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('show-cupones') }}"
                        class="px-4 py-1 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <i class="fas fa-chevron-circle-right text-gray-600 group-hover:text-yellow-600"></i>
                        <span class=" text-gray-600 group-hover:text-yellow-600 ">Modulo Campañas</span>
                    </a>
                </li>
            </ul>

            {{-- Item Parametros del sistema --}}
            <div class="relative px-4 py-1 flex items-center space-x-4 rounded-xl text-white bg-gray-900">
                <i class="fas fa-th"></i>
                <span class="-mr-1 font-medium">Parametros del Sistema</span>
            </div>
            <ul class="space-y-2 tracking-wide mt-1">
                <li>
                    <a href="{{ route('show-comercio') }}"
                        class="px-4 py-1 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <i class="fas fa-chevron-circle-right text-gray-600 group-hover:text-yellow-600"></i>
                        <span class=" text-gray-600 group-hover:text-yellow-600 ">Módulo Comercio</span>
                    </a>
                    <a href="{{ route('show-especialidad') }}"
                        class="px-4 py-1 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <i class="fas fa-chevron-circle-right text-gray-600 group-hover:text-yellow-600"></i>
                        <span class=" text-gray-600 group-hover:text-yellow-600 ">Módulo Especialidad</span>
                    </a>
                    <a href="{{ route('show-comunas') }}"
                        class="px-4 py-1 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <i class="fas fa-chevron-circle-right text-gray-600 group-hover:text-yellow-600"></i>
                        <span class=" text-gray-600 group-hover:text-yellow-600 ">Módulo Comunas</span>
                    </a>
                    <a href="{{ route('show-sectores') }}"
                        class="px-4 py-1 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <i class="fas fa-chevron-circle-right text-gray-600 group-hover:text-yellow-600"></i>
                        <span class=" text-gray-600 group-hover:text-yellow-600 ">Módulo Sectores</span>
                    </a>

                    <a href="{{ route('show-status-usuario') }}"
                        class="px-4 py-1 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <i class="fas fa-chevron-circle-right text-gray-600 group-hover:text-yellow-600"></i>
                        <span class=" text-gray-600 group-hover:text-yellow-600 ">Módulo Estado Usuario</span>
                    </a>
                    <a href="{{ route('show-ticket') }}"
                        class="px-4 py-1 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <i class="fas fa-chevron-circle-right text-gray-600 group-hover:text-yellow-600"></i>
                        <span class=" text-gray-600 group-hover:text-yellow-600 ">Módulo Estado Ticket</span>
                    </a>

                    <a href="{{ route('show-bloqueo') }}"
                        class="px-4 py-1 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <i class="fas fa-chevron-circle-right text-gray-600 group-hover:text-yellow-600"></i>
                        <span class=" text-gray-600 group-hover:text-yellow-600 ">Módulo bloqueo</span>
                    </a>

                    <a href="{{ route('show-mesero') }}"
                        class="px-4 py-1 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <i class="fas fa-chevron-circle-right text-gray-600 group-hover:text-yellow-600"></i>
                        <span class=" text-gray-600 group-hover:text-yellow-600 ">Módulo meseros</span>
                    </a>

                    <a href="{{ route('show-planes') }}"
                        class="px-4 py-1 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <i class="fas fa-chevron-circle-right text-gray-600 group-hover:text-yellow-600"></i>
                        <span class=" text-gray-600 group-hover:text-yellow-600 ">Modulo de Planes</span>
                    </a>

                   



                    {{--
                            <a href="{{ route('show-tipo-suscripciones') }}"
                        class="px-4 py-1 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <i class="fas fa-chevron-circle-right text-gray-600 group-hover:text-yellow-600"></i>
                        <span class=" text-gray-600 group-hover:text-yellow-600 ">Tipos Suscripciones</span>
                    </a>
                            --}}

                    {{--
                              <a href="{{ route('show-status-suscripciones') }}"
                        class="px-4 py-1 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <i class="fas fa-chevron-circle-right text-gray-600 group-hover:text-yellow-600"></i>
                        <span class=" text-gray-600 group-hover:text-yellow-600 ">Estado Suscripciones</span>
                    </a>
                             --}}


                </li>
            </ul>

            {{-- Item seguridad
            <div class="relative px-4 py-1 flex items-center space-x-4 rounded-xl text-white bg-gray-900">
                <i class="fas fa-th"></i>
                <span class="-mr-1 font-medium">Seguridad del Sistema</span>
            </div>
            <ul class="space-y-2 tracking-wide mt-1">
                <li>
                    <a href="/roles" class="px-4 py-1 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <i class="fas fa-chevron-circle-right text-gray-600 group-hover:text-yellow-600"></i>
                        <span class=" text-gray-600 group-hover:text-yellow-600 ">Roles</span>
                    </a>
                    <a href="/permissions" class="px-4 py-1 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <i class="fas fa-chevron-circle-right text-gray-600 group-hover:text-yellow-600"></i>
                        <span class=" text-gray-600 group-hover:text-yellow-600 ">Permisos</span>
                    </a>
                    <a href="/users" class="px-4 py-1 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <i class="fas fa-chevron-circle-right text-gray-600 group-hover:text-yellow-600"></i>
                        <span class=" text-gray-600 group-hover:text-yellow-600 ">Usuarios</span>
                    </a>
                </li>
            </ul>
--}}


        </div>
        <form method="POST" action="{{ route('logout') }}" x-data>
            @csrf
            <div class="px-6 -mx-6 pt-4 flex justify-between items-center border-t">
                <button class="px-4 py-3 flex items-center space-x-4 rounded-md text-red-600 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span class="group-hover:text-red-700">Salir</span>
                </button>

                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">

                </x-dropdown-link>

            </div>
        </form>
    </aside>
</div>
