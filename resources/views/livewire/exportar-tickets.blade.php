<div>
    <div>
        <form wire:submit.prevent="exportar">
        <div class="flex justify-center mt-10">
            <div>
                <label for="fechaInicio">Fecha de inicio:</label>
                <input type="date" wire:model="fechaInicio" id="fechaInicio">
            </div>
            <div>
                <label for="fechaFin">Fecha de término:</label>
                <input type="date" wire:model="fechaFin" id="fechaFin">
            </div>
            <div>
                <label for="estado">Estado:</label>
                <select wire:model="estado" id="estado">
                    <option value="">Todos</option>
                    <option value="1">Canjeado</option>
                    <option value="2">Bloqueado</option>
                    <!-- Agrega más opciones si es necesario -->
                </select>
            </div>
            <button type="submit">Exportar a Excel</button>
        </div>
        </form>
    </div>

</div>
