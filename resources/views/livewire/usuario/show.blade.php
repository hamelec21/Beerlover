<div>
    <div>
        <div class="p-0">
            <button class="flex items-center focus:outline-none"  wire:click="$set('open_show', true)">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-gray-600 mr-2">
                        <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                        <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z" clip-rule="evenodd" />
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


               <div class="container mx-auto px-4">
                <div class="grid grid-cols-1">
                    <div>  {{ $this->datosocio->name}}</div>
                    <div>  {{ $this->datosocio->name}}</div>
                    <div>  {{ $this->datosocio->name}}</div>
                    <div>  {{ $this->datosocio->name}}</div>
                    <div>  {{ $this->datosocio->name}}</div>
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
