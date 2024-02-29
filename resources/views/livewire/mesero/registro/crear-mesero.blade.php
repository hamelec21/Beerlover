<div>
    @livewire('navigation-menu')
    @livewire('menu.sidebar')
    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80] 2xl:w-[85%] ">

        <div class="container mx-auto bg-gray-800  rounded-lg  w-1/2">
            <h2 class="flex justify-center mt-5 py-3 font-bold text-white">Crear Nuevo Mesero</h2>
        </div>

        <div class="container mx-auto w-1/2 bg-gray-100 px-4 mt-5 rounded-lg">
            <form wire:submit="registro_mesero">
                <div class="grid grid-cols-2 gap-2">
                    <div class="col-span-2">
                        <x-input type="text" placeholder="xx.xxx.xxx-x" class="mt-10 w-full" wire:model="rut" />
                        <x-input-error for="rut" />
                    </div>

                    <div>
                        <x-input type="text" placeholder="nombre" class="mt-10 w-full" wire:model="name" />
                        <x-input-error for="name" />
                    </div>

                    <div>
                        <x-input type="text" placeholder="apellidos" class="mt-10 w-full" wire:model="apellidos" />
                        <x-input-error for="apellidos" />
                    </div>

                    <div class="col-span-2">
                        <x-input type="email" placeholder="email" class="mt-10 w-full" wire:model="email" />
                        <x-input-error for="email" />
                    </div>

                    <div>
                        <x-input type="password" placeholder="Direccion" class="mt-10 w-full" wire:model="password" />
                        <x-input-error for="password" />
                    </div>

                    <div>
                        <x-input type="password" placeholder="password" class="mt-10 w-full" wire:model="passwordConfirmation" />
                        <x-input-error for="passwordConfirmation" />
                    </div>

                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div><button type="submit" class="btn-agregar mt-10 mb-8 w-full">Guadar Mesero</button>
                    </div>
                    <div><button wire:click="cancelar" type="button"
                            class="btn-cancelar mt-10 mb-8 w-full">Cancelar</button></div>
                </div>



            </form>
        </div>

    </div>

</div>

