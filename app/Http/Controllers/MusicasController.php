<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musica;

class MusicasController extends Controller
{
    //

    public function index(){
        $musicas = Musica::all();
        return view('musicas.index',[
            'musicas' => $musicas
        ]);
    }

    public function show(Request $req){
        $idMusica = $req ->id;
        
        $musica = Musica::where('id_musica',$idMusica)->with(['musicos', 'genero', 'albuns'])->first();
      
        return view('musicas.show', [
            'musica' =>$musica 
        ]);
    }
}
