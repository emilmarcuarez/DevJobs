<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class HomeVacantes extends Component
{
    // estos se los trae de filtrarVacante
    public $termino;
    public $categoria;
    public $salario;
    // cuando ocurre el evento de terminosBusqueda, ejecuta la funcion buscar
    protected $listeners =['terminosBusqueda' => 'buscar'];
    public function buscar($termino, $categoria, $salario){
       $this->termino=$termino;
       $this->categoria=$categoria;
       $this->salario=$salario;
       
    }
    public function render()
    {
        $vacantes= Vacante::All();
        
        return view('livewire.home-vacantes',[
            'vacantes' =>$vacantes
        ]);
    }
}
