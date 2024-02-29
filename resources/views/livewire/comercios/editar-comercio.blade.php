<div>
    @livewire('navigation-menu')
    @livewire('menu.sidebar')
    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80] 2xl:w-[85%] ">

        <div class="container mx-auto bg-amber-500 rounded-lg  w-1/2">
            <h2 class="flex justify-center mt-5 py-3 font-bold text-white">Editar Comercio</h2>
        </div>

        <div class="container mx-auto w-1/2 bg-gray-100 px-4 mt-5 rounded-lg">
            <form wire:submit="update">
                <div class="grid grid-cols-2 gap-2">
                    <x-input type="text" class="mt-10 w-full" wire:model="localId" hidden />
                    <div>
                        <x-input type="text" placeholder="Nombre Comercio" class="mt-10 w-full" wire:model="nombre" />
                        <x-input-error for="nombre" />
                    </div>
                    <div>
                        <x-input type="text" placeholder="Direccion" class="mt-10 w-full" wire:model="direccion" />
                        <x-input-error for="direccion" />
                    </div>
                    <div class="mt-3">
                        <select
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm  w-full"
                            wire:model="comunas_id">
                            <option value="">Selecciones Comuna</option>
                            @foreach ($comunas as $comuna)
                                <option value="{{ $comuna->id }}">{{ $comuna->nombre }}</option>
                            @endforeach

                        </select>
                        @error('comunas_id')
                            <span class="error text-red-600 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <select
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm  w-full"
                            wire:model="sectores_id">
                            <option value="">Seleccione Sector</option>
                            @foreach ($sectores as $sector)
                                <option class="uppercase" value="{{ $sector->id }}">{{ $sector->nombre }}</option>
                            @endforeach
                        </select>
                        @error('sectores_id')
                            <span class="error text-red-600 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-3 col-span-2">
                        <select
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm  w-full"
                            wire:model="especialidades_id">
                            <option value="">Seleccione Especialidad</option>

                            @foreach ($especiales as $especial)
                                <option class="uppercase" value="{{ $especial->id }}">{{ $especial->nombre }}</option>
                            @endforeach

                        </select>

                        @error('especialidades_id')
                            <span class="error text-red-600 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div
                        class=" text-left border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full col-span-2">
                        <label class="px-2 ">Subir Logo o Imagen</label>
                        <input wire:model="imagen" type="file" name="imagen" id=""
                            class=" rounded-lg  flex-1 appearance-none border border-gray-400 w-full py-1 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        @error('imagen')
                            <span class="error text-red-600 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                </div>



                <div class="container mx-auto bg-gray-800  rounded-lg  ">
                    <h2 class="flex justify-center mt-5 py-3 font-bold text-white">Horario de Atención</h2>
                </div>

                     <div class="grid grid-cols-3 gap-4">

                    <div class="mt-3">
                        <x-input type="text" placeholder="Ingrese El Día" class=" w-full" wire:model="d1" />
                        <x-input-error for="dia1" />
                    </div>

                    <div>
                        <x-input type="time" placeholder="Ingrese El Día" class="mt-3 w-full" wire:model="ham1"/>
                        <x-input-error for="ham1" />

                    </div>

                    <div>
                        <x-input type="time" placeholder="Ingrese El Día" class="mt-3 w-full" wire:model="hpm2" />
                        <x-input-error for="hpm2" />
                    </div>

                    <div class="mt-3">
                        <x-input type="text" placeholder="Ingrese El Día" class=" w-full" wire:model="d2" />
                        <x-input-error for="dia2" />
                    </div>

                    <div>
                        <x-input type="time" placeholder="Ingrese El Día" class="mt-3 w-full" wire:model="ham3" />
                        <x-input-error for="ham3" />
                    </div>
                    <div>
                        <x-input type="time" placeholder="Ingrese El Día" class="mt-3 w-full" wire:model="hpm4" />
                        <x-input-error for="hpm4" />
                    </div>

                    <div class="mt-3">
                        <x-input type="text" placeholder="Ingrese El Día" class=" w-full" wire:model="d3" />
                        <x-input-error for="dia3" />
                    </div>

                    <div>
                        <x-input type="time" placeholder="Ingrese El Día" class="mt-3 w-full" wire:model="ham5" />
                        <x-input-error for="ham5" />
                    </div>
                    <div>
                        <x-input type="time" placeholder="Ingrese El Día" class="mt-3 w-full" wire:model="hpm6" />
                        <x-input-error for="hpm6" />
                    </div>

                    <div class="mt-3">
                        <x-input type="text" placeholder="Ingrese El Día" class=" w-full" wire:model="d4" />
                        <x-input-error for="dia4" />
                    </div>

                    <div>
                        <x-input type="time" placeholder="Ingrese El Día" class="mt-3 w-full"
                            wire:model="ham7" />
                        <x-input-error for="ham7" />
                    </div>
                    <div>
                        <x-input type="time" placeholder="Ingrese El Día" class="mt-3 w-full"
                            wire:model="hpm8" />
                        <x-input-error for="hpm8" />
                    </div>

                    <div class="mt-3">
                        <x-input type="text" placeholder="Ingrese El Día" class=" w-full" wire:model="d5" />
                        <x-input-error for="dia5" />
                    </div>

                    <div>
                        <x-input type="time" placeholder="Ingrese El Día" class="mt-3 w-full"
                            wire:model="ham9" />
                        <x-input-error for="ham9" />
                    </div>
                    <div>
                        <x-input type="time" placeholder="Ingrese El Día" class="mt-3 w-full"
                            wire:model="hpm10" />
                        <x-input-error for="hpm10" />
                    </div>

                    <div class="mt-3">
                        <x-input type="text" placeholder="Ingrese El Día" class=" w-full" wire:model="d6" />
                        <x-input-error for="d6" />
                    </div>

                    <div>
                        <x-input type="time" placeholder="Ingrese El Día" class="mt-3 w-full"
                            wire:model="ham11" />
                        <x-input-error for="ham11" />
                    </div>
                    <div>
                        <x-input type="time" placeholder="Ingrese El Día" class="mt-3 w-full"
                            wire:model="hpm12" />
                        <x-input-error for="hpm12" />
                    </div>

                    <div class="mt-3">
                        <x-input type="text" placeholder="Ingrese El Día" class=" w-full" wire:model="d7" />
                        <x-input-error for="dia7" />
                    </div>

                    <div>
                        <x-input type="time" placeholder="Ingrese El Día" class="mt-3 w-full"
                            wire:model="ham13" />
                        <x-input-error for="ham13" />
                    </div>
                    <div>
                        <x-input type="time" placeholder="Ingrese El Día" class="mt-3 w-full"
                            wire:model="hpm14" />
                        <x-input-error for="hpm14" />
                    </div>
                    <div class="col-span-3">
                        <x-input type="number" placeholder="Ingrese el Comsumo Minimo" class="mt-3 w-full"
                            wire:model="consumo_min" />
                        <x-input-error for="consumo_mi" />
                    </div>

                    <div class="col-span-3">
                        <x-input type="text" placeholder="Cerveza 350 cc" class="mt-3 w-full"
                            wire:model="cerveza" />
                        <x-input-error for="cerveza" />
                    </div>

                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div><button type="submit" class="btn-editar mt-10 mb-8 w-full">Editar Comercio</button>
                    </div>
                    <div><button wire:click="cancelar" type="button"
                            class="btn-cancelar mt-10 mb-8 w-full">Cancelar</button></div>
                </div>
            </form>
        </div>

    </div>

</div>

