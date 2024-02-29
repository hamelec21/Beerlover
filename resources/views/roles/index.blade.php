<x-app-layout>
    @livewire('navigation-menu')
    @livewire('menu.sidebar')
    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80] 2xl:w-[85%] ">
        <div class="px-4 py-2 mx-auto max-w-7x sm:px-6 lg:px-8 ">
            <br>
            <!-- component -->
            <div class="bg-white p-8 pt-10 rounded-md w-full">
                <div class="bg-gray-900 text-white rounded-xl shadow-lg text-center pt-4 pb-4">
                    Roles Registrados
                </div>
                <div class=" flex items-center justify-between pb-6">
                    <div>
                        <h2 class="text-gray-600 font-semibold">Roles</h2>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex bg-gray-50 items-center p-2 rounded-md">

                            <a href="{{ route('roles.create') }}">
                                <x-button class="ml-4"><i class="fas fa-plus-square ml-2 "></i>
                                    Nuevo Rol
                                </x-button>
                            </a>
                            
                            <input class="bg-gray-50 outline-none ml-1 block " type="text" name="" id=""
                                   placeholder="search...">
                        </div>
                    </div>
                </div>
                <div>
                    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                        <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                            <table class="min-w-full leading-normal">
                                <thead>
                                <tr>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-center text-xs font-semibold text-white uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-center text-xs font-semibold text-white uppercase tracking-wider">
                                        Nombres
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-center text-xs font-semibold text-white uppercase tracking-wider">
                                        Guard
                                    </th>

                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-center text-xs font-semibold text-white uppercase tracking-wider">
                                        Permisos
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-center text-xs font-semibold text-white uppercase tracking-wider">
                                        Acciones
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($roles as $role)
                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                            {{ $role->id }}
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                            {{ $role->name }}
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                            {{ $role->guard_name }}
                                        </td>

                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center w-2/6 space-y-4 ">
                                            @forelse ($role->permissions as $permission)
                                                      <span class="inline-block  text-white bg-green-500  px-2 py-1 text-xs font-bold mr-3 rounded-lg  ">
                                                          {{ $permission->name }}
                                                      </span>
                                            @empty
                                                <span class="inline-block rounded-min text-white bg-red-500  px-2 py-1 text-xs font-bold mr-3 rounded-lg ">Sin Permiso Asignado</span>
                                            @endforelse
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">

                                            <a href="{{ route('roles.edit', $role->id) }}"
                                               class="btn btn-yellow"><i class="fas fa-edit"></i></a>

                                            <form
                                                action="{{ route('roles.destroy', $role->id) }}"
                                                method="POST"
                                                style="display: inline-block;"
                                                onsubmit="return confirm('Seguro?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-red" type="submit" rel="tooltip">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>

                                            </form>

                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">Sin registros.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            <div
                                class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between          ">
                            <span class="text-xs xs:text-sm text-gray-900">

                            </span>
                                <div class="inline-flex mt-2 xs:mt-0">
                                    {{ $roles->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>





