<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Eleccion;
use App\Voto;

class VotoController extends Controller
{
    public function create(Request $request){
        //Obtiene el candidato
        //dd($request->all());

        $voto = new voto;
        $voto->candidato_id = $request->id;
        $voto->user_id = Auth::id();
        $voto->save();
        return $voto;
    }

    public function getVotes(){
        $votes = DB::table('votos')
        ->select('candidato_id', DB::raw('count(*) as total'))
        ->groupBy('candidato_id')
        ->get();
    }
}
