<?php

namespace App\Livewire;

use Livewire\Component;

class MostrarVacantee extends Component
{

    public $vacante;
    public function render()
    {
        return view('livewire.mostrar-vacantee');
    }
}
