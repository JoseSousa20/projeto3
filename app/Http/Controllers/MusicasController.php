<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musica;
use App\Models\Album;
use App\Models\Musico;
use App\Models\Genero;

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

    public function create(){
        $albuns = Album::all();
        $musicos = Musico::all();
        $generos = Genero::all();
        return view('musicas.create',[
            'albuns'=>$albuns,
            'musicos'=>$musicos,
            'generos'=>$generos
        ]);
    }

    public function store(Request $req){
        $novaMusica = $req -> validate([
            'titulo'=>['required','min:3','max:100'],
        ]);
        $novaMusica['id_album'] = $req->id_album;
        $novaMusica['id_musico'] = $req->id_musico;
        $novaMusica['id_genero'] = $req->id_genero;
        $musica = Musica::create($novaMusica);

        return redirect()->route('musicas.show',[
            'id' => $musica->id_musica
        ]);
    }
}
