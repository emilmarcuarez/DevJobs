<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use App\Models\Candidato;

class EditarEstado extends Component
{
    // public function render()
    // {
    //     return view('livewire.editar-estado');
    // }
    public $estado;
    public $candidato_id;
    public $vacante_id;
    public function mount(Candidato $candidato){
        $this->candidato_id=$candidato->id;
        $this->estado=$candidato->estado;
        $this->vacante_id=$candidato->vacante_id;
    }

    public function editarEstado(){
        $candidato=Candidato::find($this->candidato_id);
        $vacante=Vacante::find($this->vacante_id);
        $candidato->estado='2';
        $candidato->save();
        return redirect()->route('candidatos.index', [
            'vacante'=>$vacante
        ]);
     
    }
}
