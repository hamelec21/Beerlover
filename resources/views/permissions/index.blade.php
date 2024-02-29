<x-app-layout>
    @livewire('navigation-menu')
    @livewire('menu.sidebar')
    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80] 2xl:w-[85%] ">
        <div class="px-4 py-2 mx-auto max-w-7x sm:px-6 lg:px-8 ">
            <div class="bg-gray-900 text-white rounded-xl shadow-lg text-center pt-4 pb-4">
                Permisos Registrados
            </div>
            <br>
            <!-- component -->
            <div class="bg-white p-8 pt-10 rounded-md w-full">
                <div class=" flex items-center justify-between pb-6">
                    <div>
                        <h2 class="text-gray-600 font-semibold">Permisos</h2>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex bg-gray-50 items-center p-2 rounded-md">

                            <a href="{{ route('permissions.create') }}" target="_blank">
                                <x-button class="ml-4"><i class="fas fa-plus-square ml-2"></i>
                                    Ingrese Nuevo Permiso
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
                                            Fecha
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-center text-xs font-semibold text-white uppercase tracking-wider">
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                                {{ $permission->id }}
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                                {{ $permission->name }}
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                                {{ $permission->guard_name }}
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                                {{ $permission->created_at }}
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">

                                                <a href="{{ route('permissions.edit', $permission->id) }}"
                                                    class="btn btn-yellow"><i class="fas fa-edit"></i></a>

                                                <a href="{{ route('permissions.show', $permission->id) }}"
                                                    class="btn btn-green"><i class="fas fa-eye"></i></a>

                                                <form action="{{ route('permissions.destroy', $permission->id) }}"
                                                    method="POST" style="display: inline-block;"
                                                    onsubmit="return confirm('Seguro?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-red" type="submit" rel="tooltip">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>

                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div
                                class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between          ">
                                <span class="text-xs xs:text-sm text-gray-900">

                                </span>
                                <div class="inline-flex mt-2 xs:mt-0">
                                    {{ $permissions->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>


