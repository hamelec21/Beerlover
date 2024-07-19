<div>
    @livewire('menu-principal')

    <!--locales asociados-->
    <div class="container mx-auto mt-4 py-2 rounded-md text-gray-900">

        <h1 class="text-center text-xl font-bold">Locales Asociados</h1>

    </div>
    <!--filtros de busqueda-->
    <div class="w-full bg-gray-100 mt-2 py-4 px-4">
        <div class="grid grid-cols-3 gap-4">

            <div>
                <label class="text-md">Comuna</label>
                <select id="" class="py-2 mt-1 rounded-lg w-full px-4 text-gray-800 uppercase" type="text"
                    wire:model.live="filtro_comuna" />
                <option>Selecccione</option>
                @foreach ($comunas as $comuna)
                    <option value="{{ $comuna->id }}" class="uppercase">{{ $comuna->nombre }}</option>
                @endforeach
                </select>
            </div>
            <div>

                <label class="text-md">Sector</label>
                <select id="" class="py-2 mt-1 rounded-lg w-full px-4 text-gray-800 uppercase" type="text"
                    wire:model.live="filtro_sector" />

                <option value="">Selecccione</option>
                if($sector == "")
                @foreach ($sectores as $sector)
                    <option value="{{ $sector->id }}" class="uppercase">{{ $sector->nombre }}</option>
                @endforeach
                </select>
            </div>
            <div>
                <label class="text-md">Especialidad</label>
                <select id="" class="py-2 mt-1 rounded-lg w-full px-4 text-gray-800 uppercase" type="text"
                    wire:model.live="filtro_especial" />
                <option value="" class="uppercase">Selecccione</option>
                @foreach ($especialidades as $especialidad)
                    <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>
                @endforeach
                </select>
            </div>

        </div>
    </div>

    <!--locales asociados-->
    <div class="container mx-auto px-4 mt-5">
        @if ($comercios->count())
            <div class="grid-cols-1 gap-4">
                @foreach ($comercios as $comercio)
                <div class="flex justify-between border-2 border-gray-200">
                    <div class="flex justify-start">
                        <img src="{{ Storage::url($comercio->imagen) }}" class="w-36">
                    </div>

                    <div class="flex flex-col justify-center items-center w-full">
                        <span class="text-center font-bold">
                            {{ $comercio->nombre }}
                        </span>
                        <button class="mt-4 px-4 py-1 bg-green-600 text-white rounded">
                        <a href="{{ route('comercio', ['id' => $comercio->id]) }}">

                            Más Información
                        </button>
                    </a>
                    </div>
                </div>

                @endforeach
            </div>
        @else
            @include('components.alerta-busqueda')
        @endif

    </div>







    <div class="bg-gray-200">
        @if ($comercios->hasPages())
            <div class="px-6 py-3 ">
                {{ $comercios->links() }}
            </div>
        @endif
    </div>
</div>
