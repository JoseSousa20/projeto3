<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musico;
use App\Models\Album;
use App\Models\Musica;

class MusicosController extends Controller
{
    //
    public function inicial(){
        return view('welcome');
    }

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

    public function create(){
        $albuns = Album::all();
        $musicas = Musica::all();
        return view('musicos.create',[
            'albuns'=>$albuns,
            'musicas'=>$musicas
        ]);
    }

    public function store(Request $req){
        $novoMusico = $req -> validate([
            'nome'=>['required','min:3','max:100'],
            'nacionalidade'=>['required','min:3','max:100'],
            'data_nascimento'=>['required','date'],
            'fotografia'=>['nullable','image','max:2000'],
        ]);
        $albuns = $req->id_album;
        $musicas = $req->id_musica;
        $musico = Musico::create($novoMusico);

        return redirect()->route('musicos.show',[
            'id' => $musico->id_musico
        ]);
    }

    public function edit(Request $req){
        $editMusico = $req->id;
        $musico = Musico::where('id_musico',$editMusico)->with(['albuns', 'musica'])->first();

        return view('musicos.edit',[
            'musico'=>$musico
        ]);
    }

    public function update(Request $req){
        $idMusico = $req ->id;
        $musico = Musico::where('id_musico',$idMusico)->with(['albuns', 'musica'])->first();
        $updateMusico = $req -> validate([
            'nome'=>['required','min:3','max:100'],
            'nacionalidade'=>['required','min:3','max:100'],
            'data_nascimento'=>['required','date'],
            'fotografia'=>['nullable','image','max:2000'],
        ]);
        $musico->update($updateMusico);

        return redirect()->route('musicos.show',[
            'id' => $musico->id_musico
        ]);
    }
}
