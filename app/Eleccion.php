<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Candidato;
use App\Voto;

class Eleccion extends Model
{
     protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'descripcion',
        'estatus',

    ];

     public function candidatos()
    {
        return $this->hasMany(Candidato::class);
    }

    public function votos()
    {
        return $this->hasManyThrough(Voto::class,Candidato::class);
    }

    public function candidato()
    {
        return $this->belongsTo(Candidato::class);
    }

}
