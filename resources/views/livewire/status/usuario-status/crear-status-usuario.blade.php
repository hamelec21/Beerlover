 <div>
     @livewire('navigation-menu')
     @livewire('menu.sidebar')
     <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80] 2xl:w-[85%] ">

         <div class="container mx-auto bg-gray-800  rounded-lg  w-1/2">
             <h2 class="flex justify-center mt-5 py-3 font-bold text-white">Crear Nuevo Estado de Usuario</h2>
         </div>

         <div class="container mx-auto w-1/2 bg-gray-100 px-4 mt-5 rounded-lg">
             <form wire:submit="save">
                 <x-input type="text" placeholder="Nombre del Estado Ejem ('Bloqueado')" class="mt-10 w-full"
                     wire:model="nombre" />
                 <x-input-error for="nombre" />

                 <div class="grid grid-cols-2 gap-4">
                     <div><button type="submit" class="btn-agregar mt-10 mb-8 w-full">Guadar Nuevo Estado</button>
                     </div>
                     <div><button wire:click="cancelar" type="button"
                             class="btn-cancelar mt-10 mb-8 w-full">Cancelar</button></div>
                 </div>

             </form>
         </div>

     </div>

 </div>
