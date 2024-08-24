<div>
    <div class="relative mt-3 ">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
        </div>
        <input wire:model.live="search" type="text" id="search-navbar"
            class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
            placeholder="Search...">

    </div>

    @if (!empty($search))
        <div class="mt-auto">
            <div class="mt-2 w-full">
                <div class="bg-white border rounded-lg shadow-lg z-20 ">
                    @if ($locales->isNotEmpty())
                        @foreach ($locales as $local)
                            <a href="{{ route('socio.comercio', ['id' => $local->id]) }}">
                                <div class="p-2 border-b flex justify-around  items-center hover:bg-gray-50 px-4">
                                    <div class="flex-row justify-center items-center">
                                        <img src="{{ Storage::url($local->imagen) }}" alt="{{ $local->imagen }}"
                                            class="w-14 h-14">
                                    </div>

                                    <div class="flex-row justify-center items-center">
                                        <h2 class="">
                                            {{ $local->nombre }}
                                        </h2>
                                    </div>

                                    <div class="flex-row justify-center items-center px-4">

                                        </span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <div class="p-2 text-center text-gray-500">
                            <p>No se encontraron Comercios.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    @endif

</div>

