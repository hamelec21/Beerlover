<div>
    @include('header')
    <!--buscador-->

    <div class="px-2">
        <!--locales asociados-->
        <div class="container mx-auto mt-5 bg-amber-400 py-2 rounded-md text-gray-900">

            <h1 class="text-center text-xl font-bold">Locales Asociados</h1>

        </div>
        <!--filtros de busqueda-->
        <div class="container mx-auto px-4 bg-gray-300 mt-5 rounded-md shadow-lg py-4 border-2 border-gray-400">


            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4">

                <div>
                    <label class="text-md">Comuna</label>
                    <select id="" class="py-2 mt-1 rounded-lg w-full px-4 text-gray-800 uppercase" type="text"
                        wire:model.live="filtro_comuna" />
                    <option value="">Selecccione</option>
                    @foreach ($comunas as $comuna)
                        <option value="{{ $comuna->id }}" class="uppercase">{{ $comuna->nombre }}</option>
                    @endforeach
                    </select>
                </div>
                <div>

                    <label class="text-md">Sector</label>
                    <select id="" class="py-2 mt-1 rounded-lg w-full px-4 text-gray-800 uppercase"
                        type="text" wire:model.live="filtro_sector" />

                    <option value="">Selecccione</option>
                    if($sector == "")
                    @foreach ($sectores as $sector)
                        <option value="{{ $sector->id }}" class="uppercase">{{ $sector->nombre }}</option>
                    @endforeach
                    </select>
                </div>
                <div>
                    <label class="text-md">Especialidad</label>
                    <select id="" class="py-2 mt-1 rounded-lg w-full px-4 text-gray-800 uppercase"
                        type="text" wire:model.live="filtro_especial" />
                    <option value="" class="uppercase">Selecccione</option>
                    @foreach ($especialidades as $especialidad)
                        <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>
                    @endforeach
                    </select>
                </div>

            </div>
        </div>


        @if (session('error'))
                <div class="flex items-center p-4 mb-4 text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">{{ session('error') }}</span>
                    </div>
                </div>
            @endif

        <!--secciones de card-->
        @if ($comercios->count())
            <div class="container mx-auto mt-4 mb-10 px-2">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    @foreach ($comercios as $comercio)
                        <div class='flex items-center justify-center  px-2'>
                            <div class='w-full max-w-md  mx-auto bg-white rounded-3xl shadow-xl overflow-hidden'>
                                <div class='max-w-md mx-auto'>
                                    <div class='h-[236px]'
                                        style="background-image: url('{{ asset('storage/' . $comercio->imagen) }}'); background-size: cover; background-position: center;">
                                    </div>
                                    <div class='p-4 sm:p-6'>
                                        <!--nombre local-->
                                        <p class='font-bold text-gray-700 text-center text-lg mb-1 underline '>Machu
                                            Picchu</p>

                                        <!--Direccion-->
                                        <div class='flex-col'>
                                            <div class="mt-2">
                                                <p class='text-md font-bold text-gray-700 text-center underline'>
                                                    Dirección</p>
                                            </div>
                                            <p class="text-center text-[14px] ">{{ $comercio->direccion }}</p>
                                        </div>
                                        <!--horario de atencion-->
                                        <div class='flex-col'>
                                            <div class="mt-2">
                                                <p class='text-md font-bold text-gray-700 text-center underline'>Horario
                                                    de Atención</p>
                                            </div>

                                            <div class="flex justify-center mt-2">
                                                <table class="default justify-center">
                                                    <tr class="text-left text-[14px] ">
                                                        <th>{{ $comercio->d1 }}</th>
                                                        <td class="">
                                                            <div class="text-center text-[14px] ">
                                                                {{ \Carbon\Carbon::parse($comercio->ham1)->format('h:i A') }}
                                                                -
                                                                {{ \Carbon\Carbon::parse($comercio->hpm2)->format('h:i A') }}
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="text-left text-[14px] ">
                                                        <th>{{ $comercio->d2 }}</th>
                                                        <td class="">
                                                            <div class="text-center text-[14px] ">
                                                                {{ \Carbon\Carbon::parse($comercio->ham3)->format('h:i A') }}
                                                                -
                                                                {{ \Carbon\Carbon::parse($comercio->hpm4)->format('h:i A') }}
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="text-left text-[14px] ">
                                                        <th>{{ $comercio->d3 }}</th>
                                                        <td class="">
                                                            <div class="text-center text-[14px] ">
                                                                {{ \Carbon\Carbon::parse($comercio->ham3)->format('h:i A') }}
                                                                -
                                                                {{ \Carbon\Carbon::parse($comercio->hpm4)->format('h:i A') }}
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="text-left text-[14px] ">
                                                        <th>{{ $comercio->d4 }}</th>
                                                        <td class="">
                                                            <div class="text-center text-[14px] ">
                                                                {{ \Carbon\Carbon::parse($comercio->ham3)->format('h:i A') }}
                                                                -
                                                                {{ \Carbon\Carbon::parse($comercio->hpm4)->format('h:i A') }}
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="text-left text-[14px] ">
                                                        <th>{{ $comercio->d5 }}</th>
                                                        <td class="">
                                                            <div class="text-center">
                                                                {{ \Carbon\Carbon::parse($comercio->ham3)->format('h:i A') }}
                                                                -
                                                                {{ \Carbon\Carbon::parse($comercio->hpm4)->format('h:i A') }}
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="text-left text-[14px] ">
                                                        <th>{{ $comercio->d6 }}</th>
                                                        <td class="">
                                                            <div class="text-center">
                                                                {{ \Carbon\Carbon::parse($comercio->ham3)->format('h:i A') }}
                                                                -
                                                                {{ \Carbon\Carbon::parse($comercio->hpm4)->format('h:i A') }}
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="text-left text-[14px] ">
                                                        <th>{{ $comercio->d7 }}</th>
                                                        <td class="">
                                                            <div class="text-center">
                                                                {{ \Carbon\Carbon::parse($comercio->ham3)->format('h:i A') }}
                                                                -
                                                                {{ \Carbon\Carbon::parse($comercio->hpm4)->format('h:i A') }}
                                                            </div>
                                                        </td>
                                                    </tr>

                                                </table>
                                            </div>
                                            <!--ss-->
                                            <div
                                                class="bg-green-100 rounded-lg text-gray-800 text-center mb-2 py-1 border border-green-600">
                                                Consumo Minimo:
                                                ${{ number_format($comercio->consumo_min, 0, ',', '.') }}.-
                                            </div>
                                            <div
                                                class="bg-gray-300 rounded-lg text-gray-900 text-center py-1 border border-gray-500">
                                                <span>Canje: {{ $comercio->cerveza }}</span>
                                            </div>

                                        </div>

                                        <a href='{{ route('socio.qr', ['id' => $comercio->id]) }}'
                                            class='block mt-2 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform bg-[#FFC933] rounded-[14px] hover:bg-[#FFC933DD] focus:outline-none focus:ring focus:ring-green-700 focus:ring-opacity-80'>
                                            Crear Ticket
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach



                </div>
            </div>
        @else
            @include('components.alerta-busqueda')
        @endif

    </div>

    <div class="bg-gray-200">
        @if ($comercios->hasPages())
            <div class="px-6 py-3 ">
                {{ $comercios->links() }}
            </div>
        @endif
    </div>


</div>
