<div>

    <form wire:submit.prevent="crearCliente" class="mt-10 flex justify-center">
        
        <label for="name">Nombre:</label>
        <input type="text" wire:model="name" id="name" required>

        <label for="email">Email:</label>
        <input type="email" wire:model="email" id="email" required>

        <label for="externalId">Identificador externo:</label>
        <input type="text" wire:model="externalId" id="externalId" required>

        <button type="submit" class="bg-blue-600  hover:bg-blue-700 px-2 rounded-lg text-center text-white">Crear
            Cliente</button>
    </form>


</div>
