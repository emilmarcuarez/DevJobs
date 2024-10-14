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
        // $vacantes= Vacante::All();
        // el when se ejecuta solo cuando this->termino tiene algun dato, si esta vacio lo ignora y no ejecuta la funcion (callback), asi que se trae toldo si esta vacio
        $vacantes= Vacante::when($this->termino, function($query){
        //  where(camp de la bd, campo a comparar)
            $query->where('titulo', 'LIKE', "%" . $this->termino . "%" );
        })
        ->when($this->termino, function($query){
            $query->orWhere('empresa','LIKE', "%" . $this->termino . "%" );
        })
        ->when($this->categoria, function($query){
            $query->where('categoria_id', $this->categoria);
        })
        ->when($this->salario, function($query){
            $query->where('categoria_id', $this->salario);
        })
        ->paginate(15);
        return view('livewire.home-vacantes',[
            'vacantes' =>$vacantes
        ]);
    }
}
