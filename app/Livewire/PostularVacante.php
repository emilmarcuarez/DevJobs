<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Notifications\NuevoCandidato;

class PostularVacante extends Component
{

    use WithFileUploads;
    public $cv;
    public $vacante;
    protected $rules = [
        'cv' => 'required'
    ];

    public function mount(Vacante $vacante){
        $this->vacante=$vacante;
    }

    public function postularme()
    {
        // validate automaticamenta valida lo que esta adentro de rules
        
        $datos = $this->validate();
       
        // Almacenar CV en el disco duro
        $cv = $this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/', '', $cv);

        //  crear el candidato a la vacante. No se pone la vacante porque ya se definio en la relacion 
        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv']
        ]);
        
        // crear notificacion y enviar el email
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id,$this->vacante->titulo, auth()->user()->id));
        

        // Mostrar al usuario un mensaje de exito
        session()->flash('mensaje', 'Se envio correctamente tu informacion, mucha suerte');

        return redirect()->back();

    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
