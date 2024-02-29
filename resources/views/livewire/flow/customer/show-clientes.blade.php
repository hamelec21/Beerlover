<div>
    @livewire('navigation-menu')
    @livewire('menu.sidebar')
    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80] 2xl:w-[85%]">
        <div class="container mx-auto bg-gray-800  rounded-lg">
            <h2 class="flex justify-center mt-5 py-3 font-bold text-white">Módulo Flow Clientes</h2>
        </div>
        <!--busqueda y agregar nuevos registros-->
        <div class="container mx-auto ">
            <div class="overflow-x-auto">
                <div class="mt-5 flex  bg-gray-100 font-sans overflow-hidden rounded-lg">
                    <div class="w-full">
                        {{-- seccion de busqueda --}}
                        <div class="grid grid-cols-3 bg-gray-200py-3 px-4 gap-4 py-4">
                            <div class="">
                                <label class="text-md  font-bold">Filtro de Estados :</label>
                            </div>



                            <div> <button wire:click="updateStatus(1)"
                                    class="bg-green-600 hover:bg-green-700 rounded-lg px-4 py-1 text-white">Activos</button>
                            </div>
                            <div><button
                                    wire:click="updateStatus(0)"class="bg-red-600 hover:bg-red-700 rounded-lg px-4 py-1 text-white">Eliminados</button>
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
                @if ($clients)
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm ">
                                <th class="py-3 px-6 text-left">ID Cliente</th>
                                <th class="py-3 px-6 text-left">ID Externo</th>
                                <th class="py-3 px-6 text-left">Cliente</th>
                                <th class="py-3 px-6 text-left">Correo</th>
                                <th class="py-3 px-6 text-left">Estado</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($this->clients['data'] as $client)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-1 px-6 text-center">
                                        <div class="flex items-center font-bold uppercase">
                                            <span>{{ $client['customerId'] }}</span>
                                        </div>
                                    </td>
                                    <td class="py-1 px-6 text-center">
                                        <div class="flex items-center font-bold uppercase ">
                                            <span>{{ $client['externalId'] }}</span>
                                        </div>
                                    </td>

                                    <td class="py-1 px-6 text-center">
                                        <div class="flex items-center font-bold uppercase">
                                            <span>{{ $client['name'] }}</span>
                                        </div>
                                    </td>

                                    <td class="py-1 px-6 text-center">
                                        <div class="flex items-center font-bold uppercase ">
                                            <span>{{ $client['email'] }}</span>
                                        </div>
                                    </td>

                                    <td class="py-1 px-6 text-center">
                                        <div class="flex items-center font-bold uppercase ">

                                            <div>
                                                @if ($client['status'] == '1')
                                                    <span class="text-white bg-green-600 rounded-lg px-2 py-1">Activo</span>
                                                @elseif($client['status'] == '0')
                                                    <span class="text-white bg-red-600 rounded-lg px-2">Eliminado</span>
                                                @else
                                                    <span class="text-gray-500">No Se Registra Estado</span>
                                                @endif
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

            </div>
        </div>



    </div>
</div>

