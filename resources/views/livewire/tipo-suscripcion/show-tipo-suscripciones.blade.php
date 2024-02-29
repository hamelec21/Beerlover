<div>
    @livewire('navigation-menu')
    @livewire('menu.sidebar')
    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80] 2xl:w-[85%]">
        <div class="container mx-auto bg-gray-800  rounded-lg">
            <h2 class="flex justify-center mt-5 py-3 font-bold text-white">Módulo  de Tipos Suscripciones</h2>
        </div>
        <!--busqueda y agregar nuevos registros-->
        <div class="container mx-auto ">
            <div class="overflow-x-auto">
                <div class="mt-5 flex  bg-gray-100 font-sans overflow-hidden rounded-lg">
                    <div class="w-full">
                        {{-- seccion de busqueda --}}
                        <div class="flex justify-around bg-gray-200 items-center  py-3">
                            <div class=" text-left text-gray-900 font-bold py-1 text-sm ">
                                <input wire:model.live="search" type="text" name="titulo" id=""
                                    placeholder="Busqueda"
                                    class=" rounded-lg border-transparent flex-1 appearance-none border border-blue-600 w-full py-1 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                                @error('titulo')
                                    <span class="error text-red-600 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--boton de crear-->
                            <div>
                                <a href="{{ route('crear-tipo-suscripciones') }}">
                                    <button class="btn-agregar ">Crear Nuevo Tipo De Suscripcion</button>
                                </a>
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
                @if ($tipo_suscripciones->count())
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm ">

                                <th class="py-3 px-6 text-left">ID</th>
                                <th class="py-3 px-6 text-left">Nombre Comuna</th>
                                <th class="py-3 px-6 text-center">Acciones</th>
                            </tr>
                        </thead>

                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($tipo_suscripciones as $tipo_suscripcion)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">


                                    <td class="py-1 px-6 text-center">
                                        <div class="flex items-center font-bold uppercase">
                                            <span>{{ $tipo_suscripcion->id }}</span>
                                        </div>
                                    </td>

                                    <td class="py-1 px-6 text-center">
                                        <div class="flex items-center font-bold uppercase ">
                                            <span>{{ $tipo_suscripcion->nombre }}</span>
                                        </div>
                                    </td>

                                    <td class="py-1 px-6 text-center">
                                        <div class="flex item-center justify-center">

                                            <div class="flex items-center justify-around py-[4px]">
                                                <a
                                                    href="{{ route('editar-tipo-suscripciones', ['id' => $tipo_suscripcion->id]) }}">
                                                    <button class="btn-editar mb-1">Editar</button>
                                                </a>
                                            </div>

                                            <div class="mt-1 px-3">
                                                <a onclick="confirm('¿Estas Seguro de Eliminar El Tipo de Suscripcion?')||event.stopImmediatePropagation()"
                                                    wire:click="destroy({{ $tipo_suscripcion->id }})"><button
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
                    @if ($tipo_suscripciones->hasPages())
                        <div class="px-6 py-3 ">
                            {{ $tipo_suscripciones->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>



    </div>
</div>



