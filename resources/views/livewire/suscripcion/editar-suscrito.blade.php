<div>
    @livewire('navigation-menu')
    @livewire('menu.sidebar')
    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80] 2xl:w-[85%] ">

       <div class="container mx-auto bg-amber-500 rounded-lg  w-1/2">
           <h2 class="flex justify-center mt-5 py-3 font-bold text-white">Editar Estado</h2>
       </div>

        <div class="container mx-auto w-1/2 bg-gray-100 px-4 mt-5 rounded-lg">
            <form wire:submit.prevent="update">
                <input type="hidden" wire:model="statusId">
                <div>
                    <select id="" class="py-2  rounded-lg w-full px-4 text-gray-800 uppercase mt-5"
                        type="text" wire:model="nombre" />
                    <option value="" class="uppercase">Elegir Estado</option>
                    @foreach ($estado_usuario as $estado)
                        <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                    @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-4">
                   <div><button type="submit" class="btn-editar mt-10 mb-8 w-full">Guadar </button></div>
                   <div><button wire:click="cancelar" type="button" class="btn-cancelar mt-10 mb-8 w-full">Cancelar</button></div>
                </div>

            </form>
        </div>



    </div>

</div>
