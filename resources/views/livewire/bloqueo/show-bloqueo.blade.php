<div>
    @livewire('navigation-menu')
    @livewire('menu.sidebar')
    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80] 2xl:w-[85%]">
        <div class="container mx-auto bg-gray-800  rounded-lg">
            <h2 class="flex justify-center mt-5 py-3 font-bold text-white">Módulo de Gestión de Bloqueo</h2>
        </div>
        <!--tabla-->
        <div class="container mx-auto">
            <div class="bg-white shadow-md rounded my-6 ">

                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm ">
                            <th class="py-3 px-6 text-left">ID</th>
                            <th class="py-3 px-6 text-left">Tiempo Bloqueo</th>
                            <th class="py-3 px-6 text-center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($bloqueos as $bloqueo)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-1 px-6 text-center">
                                    <div class="flex items-center font-bold uppercase">
                                        <span>{{ $bloqueo->id }}</span>
                                    </div>
                                </td>
                                <td class="py-1 px-6 text-center">
                                    <div class="flex items-center font-bold uppercase ">
                                        <span>{{ $bloqueo->tiempo }} Min</span>
                                    </div>
                                </td>
                                <td class="py-1 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <div class="flex items-center justify-around py-[4px]">
                                            <a href="{{ route('editar-bloqueo', ['id' => $bloqueo->id]) }}">
                                                <button class="btn-editar mb-1">Editar</button>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>



    </div>
</div>
