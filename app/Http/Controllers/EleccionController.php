<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Eleccion;
use App\Candidato;


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
        $data = Voto::with('candidato')
        ->select('id_candidato', DB::raw('count(*) as total'))
        ->groupBy('id_candidato')
        ->get();
    }
}
