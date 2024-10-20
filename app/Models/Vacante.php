<?php

namespace App\Models;

use App\Models\Salario;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacante extends Model
{
    use HasFactory;
    protected $casts=['ultimo_dia' =>'date'];
    protected $fillable = [
        'titulo',
        'salario_id',
        'categoria_id',
        'empresa',
        'ultimo_dia',
        'descripcion',
        'imagen',
        'user_id'
    ];
// relacion de salario_id y categoria_id 
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
    public function salario(){
        return $this->belongsTo(Salario::class);
    }
    // relaciona la vacante con los candidatos
    public function candidatos(){
        return $this->hasMany(Candidato::class)->orderBy('created_at', 'DESC');
    }

    
    public function reclutador(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
