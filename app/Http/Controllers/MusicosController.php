<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musico;

class MusicosController extends Controller
{
    //

    public function index(){
        $musicos = Musico::all();
        return view('musicos.index',[
            'musicos' => $musicos
        ]);
    }

    public function show(Request $req){
        $idMusico = $req ->id;
        
        $musico = Musico::where('id_musico',$idMusico)->with(['albuns', 'musica'])->first();

        return view('musicos.show', [
            'musico' =>$musico 
        ]);
    }
}
