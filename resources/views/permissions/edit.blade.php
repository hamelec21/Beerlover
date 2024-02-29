
<x-app-layout>
    @livewire('navigation-menu')
    @livewire('menu.sidebar')
    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80] 2xl:w-[85%] ">
        <div class="py-3 mt-10">
            <div class=" max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form action="{{ route('permissions.update', $permission->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="p-2 mt-8">
                            <div class="flex gap-4 mb-3 ">
                                <div class=" relative w-full ">
                                    <label>Editar Permiso</label>
                                    <input  type="text" id="rol" value="{{ old('name', $permission->name) }}"
                                           class="  rounded-lg flex-1 appearance-none border border-gray-400 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                           name="name" />
                                    <x-input-error for="name"/>
                                </div>
                            </div>
                        </div>
                        <div class=" text-center pb-4">
                            <button  type="submit" class=" bg-blue-500 text-white px-4 py-2 rounded-md text-1xl font-medium hover:bg-blue-700 transition duration-300">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
   </div>
</x-app-layout>







