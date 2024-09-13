<?php

namespace App\Livewire;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{

    // los campos que son usados en el formulario, el wire:model
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    // necesario para subir imagenes o archivos con livewire
    use WithFileUploads;

    // reglas por cada uno de los campos
    protected $rules=[
        'titulo' =>'required|string',
        'salario' =>'required',
        'categoria' =>'required',
        'empresa' =>'required',
        'ultimo_dia' =>'required',
        'descripcion' =>'required',
        'imagen' =>'required|image|max:1024'
    ];
   
    // esta funcion se ejecuta al darle clic al formulario. porque este la llama al darle clic al boton para validar si los campos cumplen con las reglas
    public function crearVacante(){
       $datos= $this->validate();

    //    almacenar la imagen
        $imagen=$this->imagen->store('public/vacantes');
        // permite guardar solo el nombre de la imagen en la base de datos
        $datos['imagen']=str_replace('public/vacantes/','',$imagen);
   
    // crear la vacante
        Vacante::create([
            'titulo'=> $datos['titulo'],   
            'salario_id'=> $datos['salario'],                                                   
            'categoria_id'=> $datos['categoria'],
            'empresa'=> $datos['empresa'],
            'ultimo_dia'=> $datos['ultimo_dia'],
            'descripcion'=> $datos['descripcion'],
            'imagen'=>  $datos['imagen'],
            'user_id'=> auth()->user()->id,
        ]);

    // crear un mensaje. MENSAJE es el nombre del dicho mensaje y el segundo parametro es lo que va acontener el mismo
        session()->flash('mensaje', 'La vacante se publico correctamente');
    // redireccionar al usuario
        return redirect()->route('vacantes.index');

    }
    public function render()
    {

        // Consultar BD

        $salarios= Salario::all();
        $categorias= Categoria::all();
        return view('livewire.crear-vacante', [
            'salarios'=>$salarios,
            'categorias'=>$categorias
        ]);
    }
}
