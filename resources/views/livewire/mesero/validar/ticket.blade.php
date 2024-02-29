<div>
    @include('header_front')

    <div class="text-center font-bold text-xl mt-10 mb-10 ">
        Validar Datos del Socio
    </div>
    <div class="container mx-auto mt-10 bg-gray-100 rounded-lg w-1/2  py-20">
        <div class="flex flex-col justify-center items-center h-full space-x-2">
            <div class="text-center text-lg font-bold  px-4">
                {{$this->socio->name }}
                <br>
                {{$this->socio->apellidos }}
                <br>
                {{ $ultimoscuatrodigitos }}
            </div>

        </div>
    </div>

    <div class="flex justify-center mt-5">
        <button  wire:click="validar_ticket"
            class="text-gray-100 text-lg  font-bold w-56 px-8 py-2 rounded-lg mt-4 bg-green-600 hover:bg-green-700 shadow-md hover:text-white ">
            Validar Ticket
        </button>
    </div>

    <div class="flex justify-center mt-5">
        <button  wire:click="cancelar_ticket"
            class="text-gray-100 text-lg  font-bold w-56 px-8 py-2 rounded-lg mt-4 bg-red-600 hover:bg-red-700 shadow-md hover:text-white ">
                Cancelar Ticket
        </button>
    </div>





</div>

