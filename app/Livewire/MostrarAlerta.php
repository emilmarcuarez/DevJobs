<?php

namespace App\Livewire;

use Livewire\Component;

class MostrarAlerta extends Component
{
    // lo creo para que pueda ser usado en resources >views>livewire
    public $message;
    public function render()
    {
        return view('livewire.mostrar-alerta');
    }
}
