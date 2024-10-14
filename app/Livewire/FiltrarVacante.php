<?php

namespace App\Livewire;

use App\Models\Salario;
use Livewire\Component;
use App\Models\Categoria;

class FiltrarVacante extends Component
{
    public $termino;
    public $categoria;
    public $salario;
    
    public function leerDatosFormulario(){
        
        $this->dispatch('terminosBusqueda', $this->termino, $this->categoria, $this->salario);
    }
    public function render()
    {

        $salarios=Salario::all();
        $categorias= Categoria::all();
        return view('livewire.filtrar-vacante',[
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
