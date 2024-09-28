<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\Attributes\On;

class MostrarVacante extends Component
{
    protected $listeners=['eliminarVacante'];

    #[On('eliminarVacante')]    
    public function eliminarVacante(Vacante $vacante2) {
        $vacante2->delete();
    }
    public function render()
    {
        $vacantes=Vacante::where('user_id', auth()->user()->id)->paginate(10);
        return view('livewire.mostrar-vacante',[
            'vacantes' => $vacantes
        ]);
    }
}
