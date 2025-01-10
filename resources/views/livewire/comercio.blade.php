<div>
    @livewire('menu-segundario')
    <div class="container mx-auto px-4 mt-3">
        <div class="flex justify-start">
            <a href="{{ route('comercio-asociados') }}">
                <div class="w-10 h-10 flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 ">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                    </svg>
                </div>


            </a>
        </div>
        <div class="flex items-center mt-3 mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 text-yellow-500">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 3h2v12H3V3zm5 0v5h1V3H8zm5 0v7h1V3h-1zM8 14v7a1 1 0 01-1 1H6a1 1 0 01-1-1v-7h3zm7-1a2 2 0 00-2 2v7h-1v-7a2 2 0 00-2-2v-2h5v2zm0-2V3h-1v8h1zm-5 0V3h-1v8h1z" />
            </svg>
            <h1 class="text-gray-800 font-bold text-md ml-2"> {{ $this->locales->nombre }}</h1>
        </div>

        <div class="col-span-3">
            <img src="{{ Storage::url($locales->imagen) }}" class="object-cover h-48 w-96">
        </div>

        <!--seccion canje-->

        <div class="flex justify-between mt-2 bg-gray-100 p-2 space-x-2">
            <div class="flex-col border border-gray-300 h-16 w-full px-4">
                <span class="text-[14px]">Canje</span>
                <span class="text-[14px] font-bold">{{ $this->locales->cerveza }}</span>
            </div>

            <div class="flex-col border border-gray-300 h-16 w-full px-4">
                <span class="text-[14px]">Consumo min...</span>
                <span class="text-[14px] font-bold">${{ number_format($this->locales->consumo_min) }}</span>

            </div>

        </div>

        <div class="flex items-center mt-3 mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="w-6 h-6 text-green-600">
                <path fill-rule="evenodd"
                    d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 0 0 0-1.5h-3.75V6Z"
                    clip-rule="evenodd" />
            </svg>

            <h1 class="text-gray-800 font-bold text-md ml-2">Horario de Canje</h1>

        </div>

        <!--Horario-->

        <div class="flex flex-wrap justify-around item-center px-2 p-2 bg-gray-100">
            <div class="flex flex-col w-1/3 text-[14px] px-6">{{ $this->locales->d1 }}</div>
            <div class="flex flex-col w-1/3 text-[14px] px-6">
                {{ \Carbon\Carbon::parse($this->locales->ham1)->format('H:i') }}</div>
            <div class="flex flex-col w-1/3 text-[14px] px-6">
                {{ \Carbon\Carbon::parse($this->locales->hpm2)->format('H:i') }}</div>
            <div class="flex flex-col w-1/3 text-[14px] px-6">{{ $this->locales->d2 }}</div>
            <div class="flex flex-col w-1/3 text-[14px] px-6">
                {{ \Carbon\Carbon::parse($this->locales->ham3)->format('H:i') }}</div>
            <div class="flex flex-col w-1/3 text-[14px] px-6">
                {{ \Carbon\Carbon::parse($this->locales->hpm4)->format('H:i') }}</div>
            <div class="flex flex-col w-1/3 text-[14px] px-6">{{ $this->locales->d3 }}</div>
            <div class="flex flex-col w-1/3 text-[14px] px-6">
                {{ \Carbon\Carbon::parse($this->locales->ham5)->format('H:i') }}</div>
            <div class="flex flex-col w-1/3 text-[14px] px-6">
                {{ \Carbon\Carbon::parse($this->locales->hpm6)->format('H:i') }}</div>
            <div class="flex flex-col w-1/3 text-[14px] px-6">{{ $this->locales->d4 }}</div>
            <div class="flex flex-col w-1/3 text-[14px] px-6">
                {{ \Carbon\Carbon::parse($this->locales->ham7)->format('H:i') }}</div>
            <div class="flex flex-col w-1/3 text-[14px] px-6">
                {{ \Carbon\Carbon::parse($this->locales->hpm8)->format('H:i') }}</div>
            <div class="flex flex-col w-1/3 text-[14px] px-6">{{ $this->locales->d5 }}</div>
            <div class="flex flex-col w-1/3 text-[14px] px-6">
                {{ \Carbon\Carbon::parse($this->locales->ham9)->format('H:i') }}</div>
            <div class="flex flex-col w-1/3 text-[14px] px-6">
                {{ \Carbon\Carbon::parse($this->locales->hpm10)->format('H:i') }}</div>
            <div class="flex flex-col w-1/3 text-[14px] px-6">{{ $this->locales->d6 }}</div>
            <div class="flex flex-col w-1/3 text-[14px] px-6">
                {{ \Carbon\Carbon::parse($this->locales->ham11)->format('H:i') }}</div>
            <div class="flex flex-col w-1/3 text-[14px] px-6">
                {{ \Carbon\Carbon::parse($this->locales->hpm12)->format('H:i') }}</div>
            <div class="flex flex-col w-1/3 text-[14px] px-6">{{ $this->locales->d7 }}</div>
            <div class="flex flex-col w-1/3 text-[14px] px-6">
                {{ \Carbon\Carbon::parse($this->locales->ham13)->format('H:i') }}</div>
            <div class="flex flex-col w-1/3 text-[14px] px-6">
                {{ \Carbon\Carbon::parse($this->locales->hpm14)->format('H:i') }}</div>
        </div>



        <div class="flex items-center mt-3 mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="w-6 h-6 text-red-600">
                <path fill-rule="evenodd"
                    d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                    clip-rule="evenodd" />
            </svg>
            <h1 class="text-gray-800 font-bold text-md ml-2">Ubicación</h1>

        </div>

        <div class="flex flex-wrap justify-around item-center px-2 p-2 bg-gray-100 mb-10">
            <div class="flex flex-col w-1/2 text-[14px]">Dirección</div>
            <div class="flex flex-col w-1/2 text-[14px]">{{ $this->locales->direccion }}</div>
            <div class="flex flex-col w-1/2 text-[14px]">Comuna</div>
            <div class="flex flex-col w-1/2 text-[14px]">{{ $this->locales->comuna->nombre }}</div>
            <div class="flex flex-col w-1/2 text-[14px]">Sector</div>
            <div class="flex flex-col w-1/2 text-[14px]">{{ $this->locales->sector->nombre }}</div>

        </div>

    </div>
@livewire('footer')

</div>
