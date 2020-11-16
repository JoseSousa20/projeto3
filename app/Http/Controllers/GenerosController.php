<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genero;

class GenerosController extends Controller
{
    //
    public function index(){
        $generos = Genero::all();
        return view('generos.index',[
            'generos' => $generos
        ]);
    }

    public function show(Request $req){
        $idGenero = $req ->id;
        
        $genero = Genero::where('id_genero',$idGenero)->with(['albuns', 'musicas'])->first();

        return view('generos.show', [
            'generos' =>$genero 
        ]);
    }
}
