<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Eleccion;
use App\Candidato;
use App\Voto;
use DB;


class EleccionController extends Controller
{

    public function index(){
        return Eleccion::get();

    }

    public function show($id){

        return Eleccion::with('candidatos')->find($id);
    }

    public function create(Request $request)
    {
        $eleccion = new Eleccion;
        $eleccion->descripcion = $request->descripcion;
        $eleccion->fecha_inicio = $request->fecha_inicio;
        $eleccion->fecha_fin = $request->fecha_fin;
        $eleccion->save();
        return $eleccion;
    }

    //public function getEstadistica(){

        //return Eleccion::with('candidatos.votos')->get();
    //}

    public function getEstadistica(){

        $candidatos = DB::table('votos')
            ->select(DB::raw('count(votos.user_id) as votos, candidatos.nombre, candidatos.apellido_paterno, candidatos.apellido_materno,eleccions.descripcion as eleccion,eleccions.fecha_inicio as f_inicio,eleccions.fecha_fin as f_fin'))
            ->Join('candidatos', 'candidatos.id', '=', 'votos.candidato_id')
            ->Join('eleccions', 'eleccions.id', '=', 'candidatos.eleccion_id')
            ->groupBy('votos.candidato_id')
            ->get();

        return $candidatos;
       /* $sql=DB::table('votos')
            ->Join('candidatos', 'candidatos.id', '=', 'votos.candidato_id')
            ->Join('users', 'users.id', '=', 'votos.user_id')
            ->get();
        return $sql;*/
        //return Voto::with('candidato')->get();

        /*
        ->select('candidato_id', DB::raw('count(*) as total'))
        ->groupBy('candidato_id')
        ->get();*/
    }
}
