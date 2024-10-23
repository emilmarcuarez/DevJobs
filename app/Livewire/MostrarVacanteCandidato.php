<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use App\Models\Candidato;

class MostrarVacanteCandidato extends Component
{
    
  
    public function render()
    {
        // Obtener todas las candidaturas del usuario autenticado
        $candidaturas = Candidato::where('user_id', auth()->user()->id)->get();
    
        // Obtener las vacantes correspondientes a esas candidaturas con su estado
        $vacantes = Vacante::whereIn('id', $candidaturas->pluck('vacante_id'))
                    ->with(['candidatos' => function($query) {
                        $query->where('user_id', auth()->user()->id);
                    }])
                    ->get();
    
        return view('livewire.mostrar-vacante-candidato', [
            'vacantes' => $vacantes
        ]);
    }
    
}