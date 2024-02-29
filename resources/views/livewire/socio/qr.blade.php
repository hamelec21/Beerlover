<div>
    @include('header')

    <div class="container mx-auto mt-10">
        <div class="w-full flex justify-center">
            <div class="text-center mt-10">
                {{--
                    {{QrCode::size(150)->generate(route('socio.ticket', ['id' => $comercio->id]))}}
                     --}}


                {{ QrCode::size(150)->generate(route('validar.ticket', ['id' => $comercio->id,'user_id' => $this->user_id])) }}
            </div>
        </div>

        {{ $this->user_id }}

        <div class="flex justify-center mt-10 px-4">
            <a  href='{{ route('socio.home')}}'
            class='block mt-2 w-full px-4 py-2  text-white font-medium  text-center  bg-red-600 rounded-[14px] hover:bg-red-700'>
            Cancelar
        </a>
        </div>



    </div>











    </div>
