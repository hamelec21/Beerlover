<?php

namespace App\Livewire\Busquedas;
use App\Models\Local;
use Livewire\Component;
use Livewire\WithPagination;

class Buscarhomemenusocio extends Component
{


    use WithPagination;


    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        $locales = collect(); // Crear una colección vacía por defecto

        if (!empty($this->search)) {
            $locales = Local::buscar($this->search)
                ->orderBy('id', 'ASC')
                ->paginate(100);
        }
        return view('livewire.busquedas.buscarhomemenusocio',compact('locales'));
    }
}
