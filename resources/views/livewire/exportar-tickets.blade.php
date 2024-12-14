<div>
    @livewire('navigation-menu')
    @livewire('menu.sidebar')
    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80] 2xl:w-[85%]">

        <h2 class="text-center mt-10 text-gray-800 text-lg">Exportar tickets Creados </h2>

        <div class="bg-gray-200 container mx-auto  mt-5 rounded-lg">
            <div class="flex justify-center items-center">
                <form wire:submit.prevent="exportar" class="flex justify-center items-center">
                    <div class="flex justify-center  space-x-4 items-center mt-5 mb-5">
                        <div class="flex flex-col items-center">
                            <label for="fechaInicio">Fecha de inicio:</label>
                            <input type="date" wire:model="fechaInicio" id="fechaInicio" class="mt-1">
                        </div>
                        <div class="flex flex-col items-center">
                            <label for="fechaFin">Fecha de término:</label>
                            <input type="date" wire:model="fechaFin" id="fechaFin" class="mt-1">
                        </div>
                        <div class="flex flex-col items-center">
                            <label for="estado">Estado:</label>
                            <select wire:model="estado" id="estado" class="mt-1">
                                <option value="">Todos</option>
                                <option value="1">Canjeado</option>
                                <option value="2">Bloqueado</option>
                                <!-- Agrega más opciones si es necesario -->
                            </select>
                        </div>
                        <button type="submit" class="self-center mt-6 bg-gray-800 text-white px-4 py-2 rounded">Exportar a Excel</button>
                    </div>
                </form>
            </div>

        </div>

    </div>

</div>
