<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Eleccion;
use App\Candidato;

class Voto extends Model
{
    protected $tabla = 'votos';
    //public $timestamps = false;

    public function candidato()
    {
        return $this->belongsTo(Candidato::class);
    }
}
