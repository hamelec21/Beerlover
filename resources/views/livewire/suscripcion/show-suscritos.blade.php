<div>
    @livewire('navigation-menu')
    @livewire('menu.sidebar')
    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80] 2xl:w-[85%]">
        <div class="container mx-auto bg-gray-800  rounded-lg">
            <h2 class="flex justify-center mt-5 py-3 font-bold text-white">Módulo de Tipos Suscripciones</h2>
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
                            <div>
                                <select id="" class="py-2 mt-1 rounded-lg w-full px-4 text-gray-800 uppercase"
                                    type="text" wire:model.live="filtro_estado" />
                                <option value="" class="uppercase">Elegir Estado</option>
                                @foreach ($estado_usuario as $estado)
                                    <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                                @endforeach
                                </select>
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
                @if ($usuarios->count())
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm ">

                                <th class="py-3 px-6 text-left">ID</th>
                                <th class="py-3 px-6 text-left">nombre</th>
                                <th class="py-3 px-6 text-left">apellidos</th>
                                <th class="py-3 px-6 text-left">email</th>
                                <th class="py-3 px-6 text-left">estado</th>
                                <th class="py-3 px-6 text-left">Fecha Registro</th>
                                <th class="py-3 px-6 text-center">Acciones</th>
                            </tr>
                        </thead>

                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($usuarios as $usuario)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">


                                    <td class="py-1 px-6 text-center">
                                        <div class="flex items-center font-bold uppercase">
                                            <span>{{ $usuario->id }}</span>
                                        </div>
                                    </td>

                                    <td class="py-1 px-6 text-center">
                                        <div class="flex items-center font-bold uppercase ">
                                            <span>{{ $usuario->name }}
                                               </span>
                                        </div>
                                    </td>

                                    <td class="py-1 px-6 text-center">
                                        <div class="flex items-center font-bold uppercase ">
                                            <span> {{ $usuario->apellidos }}</span>
                                        </div>
                                    </td>


                                    <td class="py-1 px-6 text-center">
                                        <div class="flex items-center font-bold ">
                                            <span>{{ $usuario->email }}</span>
                                        </div>
                                    </td>

                                    <td class="py-1 px-6 text-center">
                                        <div class="flex items-center font-bold uppercase ">

                                            <div>
                                                @if ($usuario->usuario_status_id == '1')
                                                <span class="text-white bg-green-600 rounded-lg px-2 py-1">Registrado</span>
                                            @elseif($usuario->usuario_status_id == '2')
                                                <span class="text-white bg-yellow-500 rounded-lg px-2 py-1">Pendiente</span>
                                            @elseif($usuario->usuario_status_id == '3')
                                                <span class="text-white bg-blue-600 rounded-lg px-2 py-1">Activo</span>
                                            @elseif($usuario->usuario_status_id == '4')
                                                <span class="text-white bg-red-600 rounded-lg px-2 py-1">Suspendido</span>
                                            @elseif($usuario->usuario_status_id == '5')
                                                <span class="text-white bg-gray-600 rounded-lg px-2 py-1">Baja</span>
                                            @else
                                                <span class="text-gray-500">No Se Registra Estado</span>
                                            @endif
                                            </div>

                                        </div>
                                    </td>

                                    <td class="py-1 px-6 text-center">
                                        <div class="flex items-center font-bold uppercase ">
                                            <span>{{ \Carbon\Carbon::parse($usuario->created_at)->format('d/m/Y') }}</span>
                                        </div>
                                    </td>

                                    <td class="py-1 px-6 text-center">
                                        <div class="flex item-center justify-center">

                                            <div class="flex items-center justify-around py-[4px]">
                                                <a
                                                    href="{{ route('editar-suscrito', ['id' => $usuario->id]) }}">
                                                    <button class="btn-editar mb-1">Editar</button>
                                                </a>
                                            </div>

                                            <div class="mt-1 px-3">
                                                <a onclick="confirm('¿Estas Seguro de Eliminar El Tipo de Suscripcion?')||event.stopImmediatePropagation()"
                                                    wire:click="destroy({{ $usuario->id }})"><button
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
                    @if ($usuarios->hasPages())
                        <div class="px-6 py-3 ">
                            {{ $usuarios->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>



    </div>
</div>
