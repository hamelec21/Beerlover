<div>
    @livewire('navigation-menu')
    @livewire('menu.sidebar')
    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80] 2xl:w-[85%]">
        <div class="container mx-auto bg-gray-800  rounded-lg">
            <h2 class="flex justify-center mt-5 py-3 font-bold text-white">Módulo de Gestion de Tickets</h2>
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
                                <label class="text-md">Estado Ticket</label>
                                <select id="" class="py-2 mt-1 rounded-lg w-full px-4 text-gray-800 uppercase"
                                    type="text" wire:model.live="filtro_estado" />
                                <option value="">Selecccione</option>
                                  @foreach ($estados as $estado)
                                        <option value="{{ $estado->id }}" class="uppercase">{{ $estado->nombre }}
                                        </option>
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
                @if ($tickets->count())
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm ">
                                <th class="py-3 px-6 text-left">Codigo</th>
                                <th class="py-3 px-6 text-left">Estado</th>
                                <th class="py-3 px-6 text-left">usuario</th>
                                <th class="py-3 px-6 text-left">Comercio</th>
                                <th class="py-3 px-6 text-left">Especialidad</th>
                                <th class="py-3 px-6 text-left">Sector</th>
                                <th class="py-3 px-6 text-left">Comuna</th>
                                <th class="py-3 px-6 text-left">fecha</th>
                                <th class="py-3 px-6 text-left">Hora</th>
                                <th class="py-3 px-6 text-left">Ver</th>

                            </tr>
                        </thead>

                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($tickets as $ticket)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-1 px-6 text-center">
                                        <div class="flex items-center font-bold uppercase ">
                                            <span>{{ $ticket->codigo_ticket }}</span>
                                        </div>
                                    </td>
                                    <td class="py-1 px-6 text-center">
                                        <div class="flex items-center font-bold uppercase ">

                                            <div>
                                                @if ($ticket->ticket_status_id == '1')
                                                    <span
                                                        class="text-white bg-green-600 rounded-lg px-2">Canjeado</span>
                                                @elseif($ticket->ticket_status_id == '2')
                                                    <span class="text-white bg-red-600 rounded-lg px-2">Bloqueado</span>
                                                @else
                                                    <span class="text-gray-500">Sin Estado</span>
                                                @endif
                                            </div>

                                        </div>

                                    </td>
                                    <td class="py-1 px-6 text-center">
                                        <div class="flex items-center font-bold uppercase ">
                                            <span>{{ $ticket->usuario->name }} {{ $ticket->usuario->apellidos }}</span>
                                        </div>
                                    </td>
                                    <td class="py-1 px-6 text-center">
                                        <div class="flex items-center font-bold uppercase ">
                                            <span>{{ $ticket->local->nombre }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="py-1 px-6 text-center">
                                        <div class="flex items-center font-bold uppercase ">
                                            <span>{{ $ticket->especialidad->nombre }}</span>
                                        </div>
                                    </td>
                                    <td class="py-1 px-6 text-center">
                                        <div class="flex items-center font-bold uppercase ">
                                            <span>{{ $ticket->sector->nombre }}</span>
                                        </div>
                                    </td>
                                    <td class="py-1 px-6 text-center">
                                        <div class="flex items-center font-bold uppercase ">
                                            <span>{{ $ticket->comuna->nombre }}</span>
                                        </div>
                                    </td>
                                    <td class="py-1 px-6 text-center">
                                        <div class="flex items-center font-bold uppercase ">
                                            <span>{{ \Carbon\Carbon::parse($ticket->fecha_canje)->locale('es')->isoFormat('dddd, DD/MM/YYYY') }}
                                            </span>
                                        </div>
                                    </td>

                                    <td class="py-1 px-6 text-center">
                                        <div class="flex items-center font-bold uppercase ">
                                            <span>{{ \Carbon\Carbon::parse($ticket->hora)->format('H:i:s') }}
                                            </span>
                                        </div>
                                    </td>

                                    <td class="py-1 px-6 text-center">
                                        @livewire('usuario.show',['ticket'=>$ticket],key($ticket->id))
                                    </td>




                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                @else
                    @include('components.alerta-busqueda')
                @endif
                <div class="bg-gray-200">
                    @if ($tickets->hasPages())
                        <div class="px-6 py-3 ">
                            {{ $tickets->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>



    </div>
</div>
