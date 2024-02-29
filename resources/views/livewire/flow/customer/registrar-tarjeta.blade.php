<div>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registrar Tarjeta</div>

                    <div class="card-body">
                        {{-- Add your form or HTML content here --}}
                        <form wire:submit.prevent="registroTarjeta">
                            {{-- Add your form fields here --}}
                            <div class="form-group">
                                <label for="url_return">URL de retorno:</label>
                                <input type="text" wire:model="url_return" class="form-control" id="url_return" placeholder="Ingrese la URL de retorno">
                            </div>

                            {{-- Add more form fields as needed --}}

                            <button type="submit" class="btn btn-primary">Registrar Tarjeta</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
