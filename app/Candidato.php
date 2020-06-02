<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Eleccion;
use App\Voto;

class Candidato extends Model
{
     protected $fillable = [
        'apellido_materno',
        'apellido_paterno',
        'eleccion_id',
        'imagen_path',
        'nombre',
        'propuestas',
    ];

    public function eleccion(){
        return $this->belongsTo(Eleccion::class, 'eleccion_id');
    }

     public function votos()
    {
        return $this->hasMany(Voto::class);
    }

}
