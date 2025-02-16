<div>
    @livewire('navigation-menu')
    @livewire('menu.sidebar')
    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80] 2xl:w-[85%] ">

       <div class="container mx-auto bg-amber-500 rounded-lg  w-1/2">
           <h2 class="flex justify-center mt-5 py-3 font-bold text-white">Editar Plan</h2>
       </div>

        <div class="container mx-auto w-1/2 bg-gray-100 px-4 mt-5 rounded-lg">
            <form wire:submit.prevent="update">
                <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                    x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false"
                    x-on:livewire-upload-error="uploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                <input type="hidden" wire:model="planId">

                <x-input type="text" placeholder="" class="mt-10 w-full" wire:model="nombre"/>
                <x-input-error for="nombre" />

                <div class="mt-5 mb-5 rounded-lg"wire.defer>
                    <textarea wire:model.defer="descripcion" id="editor"  rows="5" class="rounded-lg  flex-1 appearance-none border border-gray-400 w-full py-1 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        {!! $descripcion !!}
                    </textarea>
                    <x-input-error for="descripcion" />
                </div>

                <div class="mt-5 mb-5">
                    <x-input type="text" placeholder="Tipo de Plan ,Mensual" class="mt-10  w-full"
                    wire:model="tipo_plan" />
                    <x-input-error for="tipo_plan" />
                </div>

                <x-input type="number" placeholder="Precio Plan" class="w-full" wire:model="valor" />
                <x-input-error for="valor" />

                <div
                    class=" text-left border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full col-span-2 mt-5">
                    <label class="px-2 ">Subir Icono</label>
                    <input wire:model="imagen" type="file" name="imagen" id=""
                        class=" rounded-lg  flex-1 appearance-none border border-gray-400 w-full py-1 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                    @error('imagen')
                        <span class="error text-red-600 text-xs">{{ $message }}</span>
                    @enderror

                     <!-- Progress Bar -->
                     <div x-show="uploading" class="mt-4">
                        <div class="relative pt-1">
                            <!-- Progress Bar Container -->
                            <div class="flex mb-2 items-center justify-between">
                                <div>
                                    <span class="text-sm font-semibold inline-block py-1 px-2 uppercase rounded-full text-gray-600 bg-gray-200">
                                        Cargando...
                                    </span>
                                </div>
                                <div class="text-right">
                                    <span class="text-sm font-semibold inline-block py-1 px-2 uppercase rounded-full text-gray-600 bg-gray-200">
                                        <div x-text="progress"></div>
                                    </span>
                                </div>
                            </div>

                            <!-- Custom Progress Bar -->
                            <div class="w-4/5 bg-gray-300 rounded-full h-2 mx-auto">
                                <div
                                    class="bg-yellow-400 h-2 rounded-full"
                                    x-bind:style="'width: ' + progress + '%'"
                                >
                                    <!-- Dynamic progress bar width -->
                                </div>
                            </div>

                            <!-- Display something when progress reaches 100% -->
                            <div x-show="progress === 100" class="text-center text-green-500 mt-2">
                                ¡Carga completa!
                            </div>
                        </div>
                    </div>
                </div>

                <div class=" border border-gray-100 mt-3 flex justify-center">
                    <img src="{{ Storage::url($this->imagen) }}" alt="Imagen del plan" class="w-[100px] h-[100px]">
                </div>

                <div class="mt-5 mb-5 flex items-center space-x-2">
                    <x-input id="is_active" type="checkbox" wire:model="is_active" />
                    <label for="is_active" class="text-gray-700">Activar Plan</label>
                    <x-input-error for="is_active" />
                </div>


                <div class="grid grid-cols-2 gap-4">
                   <div><button type="submit" class="btn-editar mt-10 mb-8 w-full">Guadar </button></div>
                   <div><button wire:click="cancelar" type="button" class="btn-cancelar mt-10 mb-8 w-full">Cancelar</button></div>
                </div>

            </form>
        </div>



    </div>

    <script>
        document.addEventListener('livewire:load', function () {
     ClassicEditor
         .create(document.querySelector('#editor'), {
             toolbar: [] // Oculta la barra de herramientas
         })
         .then(editor => {
             editor.model.document.on('change:data', () => {
                 let data = editor.getData();
                 console.log(data); // Verifica lo que se está enviando
                 @this.set('descripcion', data); // Sincroniza con Livewire
             });
         })
         .catch(error => {
             console.error(error);
         });
 });

     </script>

</div>
