<div>
    @livewire('menu-segundario')

    <div class="text-center font-bold text-xl mt-10 mb-10 ">
        Validar Ticket
    </div>

    <div class="px-4">
        <div class="container mx-auto bg-gray-100 py-20 flex flex-col items-center">
            <div class="mt-5 w-full flex justify-center">
                <button wire:click="validar_ticket"
                    class="text-white text-lg font-bold w-56 px-8 py-2 rounded-lg bg-green-600 hover:bg-green-700 shadow-md">
                    Validar Ticket
                </button>
            </div>

            <div class="mt-5 w-full flex justify-center">
                <button wire:click="cancelar_ticket"
                    class="text-white text-lg font-bold w-56 px-8 py-2 rounded-lg bg-red-600 hover:bg-red-700 shadow-md">
                    Rechazar Ticket
                </button>
            </div>
        </div>
    </div>









</div>

