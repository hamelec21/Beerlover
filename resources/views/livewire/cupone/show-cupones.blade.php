<div>
    @livewire('navigation-menu')
    @livewire('menu.sidebar')
    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80] 2xl:w-[85%]">
        <div class="container mx-auto bg-gray-800  rounded-lg">
            <h2 class="flex justify-center mt-5 py-3 font-bold text-white">Módulo de Gestión de Cupones</h2>
        </div>
        <!--busqueda y agregar nuevos registros-->
        <div class="container mx-auto ">
            <div class="overflow-x-auto">
                <div class="mt-5 flex  bg-gray-100 font-sans overflow-hidden rounded-lg">
                    <div class="w-full">
                        {{-- seccion de busqueda --}}
                        <div class="flex justify-around bg-gray-200 items-center  py-3">

                            <!--boton de crear-->
                            <div>
                                <a href="{{ route('crear-cupon') }}">
                                    <button class="btn-agregar ">Crear Nueva Cupon</button>
                                </a>
                            </div>

                            <div class="text-left text-gray-900 font-bold py-1 text-sm w-1/2">
                                <input wire:model.live="search" type="text" name="titulo" id=""
                                    placeholder="Busqueda"
                                    class=" rounded-lg border-transparent flex-1 appearance-none border border-blue-600 w-full py-1 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                                @error('titulo')
                                    <span class="error text-red-600 text-xs">{{ $message }}</span>
                                @enderror
                            </div>


                            <div>
                                <div class="flex justify-center items-center">
                                    <button  wire:click="exportCampanaToExcel" class="self-center  bg-gray-800 text-white px-4 py-1.5 rounded">Exportar a Excel</button>
                                </div>
                            </div>

                        </div>
                        <!--tabla de contenido-->
                    </div>
                </div>
            </div>

        </div>

        <!--tabla-->
        <div class="container mx-auto">
            <div class="bg-white shadow-md rounded my-6 ">
                @if ($cupones->count())
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm ">

                                <th class="py-3 px-6 text-left">ID</th>
                                <th class="py-3 px-6 text-left">Codigo</th>
                                <th class="py-3 px-6 text-left">Nombre Cupon</th>
                                <th class="py-3 px-6 text-center">Cupones Usados</th>
                                <th class="py-3 px-6 text-center">Acciones</th>
                            </tr>
                        </thead>

                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($cupones as $cupon)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">


                                    <td class="py-1 px-6 text-center">
                                        <div class="flex items-center font-bold uppercase">
                                            <span>{{ $cupon->id }}</span>
                                        </div>
                                    </td>

                                    <td class="py-1 px-6 text-center">
                                        <div class="flex items-center font-bold uppercase ">
                                            <span>{{ $cupon->codigo }}</span>
                                        </div>
                                    </td>
                                    <td class="py-1 px-6 text-center">
                                        <div class="flex items-center font-bold uppercase ">
                                            <span>{{ $cupon->nombre }}</span>
                                        </div>
                                    </td>

                                    <td class="py-1 px-6 text-center">
                                        <div class="flex items-center font-bold uppercase justify-center ">
                                            <span class="bg-sky-200 px-4 rounded-lg py-1 text-sky-600">{{ $cupon->users_count }}</span>
                                        </div>
                                    </td>


                                    <td class="py-1 px-6 text-center">
                                        <div class="flex item-center justify-center">

                                            <div class="flex items-center justify-around py-[4px]">
                                                <a
                                                    href="{{ route('editar-cupon', ['id' => $cupon->id]) }}">
                                                    <button class="btn-editar mb-1">Editar</button>
                                                </a>
                                            </div>

                                            <div class="mt-1 px-3">
                                                <a onclick="confirm('¿Estas Seguro de Eliminar El Cupon?')||event.stopImmediatePropagation()"
                                                    wire:click="destroy({{ $cupon->id }})"><button
                                                        class="btn btn-eliminar ">Eliminar</button> </a>
                                            </div>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                @else
                    @include('components.alerta-busqueda')
                @endif
                <div class="bg-gray-200">
                    @if ($cupones->hasPages())
                        <div class="px-6 py-3 ">
                            {{ $cupones->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>



    </div>
</div>




