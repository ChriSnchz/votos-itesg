<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Candidato;

class CandidatoController extends Controller
{
    public function index(){
        return Candidato::with('eleccion')->get();
    }
     public function create(Request $request)
    {
        /*$image = $request->image;  
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = 'imagen.jpeg';
        \File::put(public_path(). '/' . $imageName, base64_decode($image));
        dd($request->all());*/
        $candidato = new Candidato;
        $candidato->nombre = $request->nombre;
        $candidato->apellido_paterno = $request->apellido_paterno;
        $candidato->apellido_materno = $request->apellido_materno;
        $candidato->eleccion_id = $request->eleccion_id;
        $candidato->fecha_nacimiento = $request->fecha_nacimiento;
        $candidato->imagen_path = $request->image;
        $candidato->propuestas = $request->propuestas;
        $candidato->save();
        return $candidato;
    }
}
