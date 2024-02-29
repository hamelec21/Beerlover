<?php
namespace App\Livewire\Comunas;
use App\Models\Comuna;
use Livewire\Component;
class EditarComuna extends Component
{
    public $comunaId; // variablr oculta en formulario
    public $nombre; // variables publicas del formularios

    public function mount($id)
    {
        $comuna = Comuna::find($id);
        if (!$comuna) {
            return redirect()->route('show-comunas')->with('error', 'Registro de Comuna no encontrado.');
        }
        $this->comunaId = $comuna->id;
        $this->nombre = $comuna->nombre;
    }

    public function update()
    {
        $this->validate([
            'nombre' => 'required',
        ]);
        $comuna = Comuna::find($this->comunaId);
        if (!$comuna) {
            return redirect()->route('show-comunas')->with('error', 'Registro de Comuna no encontrado.');
        }
        $comuna->nombre = $this->nombre;
        $comuna->save();
        $this->dispatch('editar');
        return redirect()->route('show-comunas');
    }

    public function cancelar()
    {
        return redirect()->route('show-comunas');
    }
    public function render()
    {
        return view('livewire.comunas.editar-comuna');
    }
}
