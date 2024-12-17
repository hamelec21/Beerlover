<div>
    <div>
        <div class="p-0">
            <button class="flex items-center focus:outline-none" wire:click="$set('open_show', true)">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-6 h-6 text-yellow-500 mr-2">
                        <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                        <path fill-rule="evenodd"
                            d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </button>
        </div>

        <x-dialog-modal wire:model="open_show" maxWidth="3xl">
            <x-slot name="title">
                <div class="container mx-auto bg-gray-800  rounded-lg">
                    <h2 class="flex justify-center mt-5 py-3 font-bold text-white">Datos del Socio</h2>
                </div>
            </x-slot>
            <x-slot name="content">


                <div class="container mx-auto mt-10 w-full lg:w-1/2 rounded-lg border border-gray-300 p-5">
                    <div class="grid grid-cols-1 gap-4 justify-items-center ">
                        <div class="flex flex-col items-start">
                            <div class="text-lg text-[#1d537c]">Rut<span
                                    class="px-2">{{ $this->formatRut($this->datosocio->rut) }}</span></div>
                            <div class="text-left text-lg text-[#1d537c]">Nombre:<span
                                    class="px-2">{{ $this->datosocio->name }}</span></div>
                            <div class="text-left text-lg text-[#1d537c]">Apellidos:<span
                                    class="px-2">{{ $this->datosocio->apellidos }}
                                    {{ $this->datosocio->sapellido }}</span></div>
                                    <div class="text-left text-lg text-[#1d537c]">Email:<span
                                        class="px-2">{{ $this->datosocio->email}}</span></div>
                        </div>
                    </div>
                    <div class="mt-5">
                        @if ($datosocio->usuario_status_id == 1)
                            <span class="text-white bg-green-600 rounded-lg px-2 py-1">Registrado</span>
                        @elseif($datosocio->usuario_status_id == 2)
                            <span class="text-white bg-red-600 rounded-lg px-2 py-1">Pendiente</span>
                        @elseif($datosocio->usuario_status_id == 3)
                            <span class="text-white bg-blue-600 rounded-lg px-2 py-1">Activo</span>
                        @elseif($datosocio->usuario_status_id == 4)
                            <span class="text-white bg-yellow-500 rounded-lg px-2 py-1">Suspendido</span>
                        @elseif($datosocio->usuario_status_id == 5)
                            <span class="text-white bg-gray-600 rounded-lg px-2 py-1">Baja</span>
                        @else
                            <span class="text-gray-500">Sin Estado</span>
                        @endif
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">

                <x-secondary-button class="ml-4" wire:click="$set('open_show',false)">
                    Cancelar
                </x-secondary-button>
            </x-slot>
        </x-dialog-modal>
    </div>

</div>
