<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Candidato extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'vacante_id',
        'cv'
    ];
    
    //  que el campo user es la relacion de candidato con la vacante. aqui traemos al usuario asoicado a la vacante
    public function user(){
        return $this->belongsTo(User::class);
    }
}
