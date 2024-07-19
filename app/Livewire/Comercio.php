<?php

namespace App\Livewire;

use App\Models\Local;
use Livewire\Component;

class Comercio extends Component
{

public $query,$locales;

 public function mount($id)
 {
    $this->query=$id;
    $this->locales= Local::where('id',$this->query)->first();
 }
    public function render()
    {

        return view('livewire.comercio');
    }
}
