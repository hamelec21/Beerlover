<div>
    <nav class="bg-green-600">

        <div class="flex justify-around  h-20 lg:h-28 px-4 items-center">

            <div class="flex justify-start w-1/4 lg:full">
                <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{ asset('img/logo/logo_beerlover.png') }}" class="h-8 lg:h-20" alt="" />
                </a>
            </div>

            <div class="w-3/4 lg:w-full">
                @livewire('busquedas.buscarhomemenusocio')
            </div>

        </div>

    </nav>


</div>

