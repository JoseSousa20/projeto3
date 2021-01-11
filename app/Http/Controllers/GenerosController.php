<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genero;
use App\Models\Musica;
use App\Models\Album;

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

    public function create(){
        $albuns = Album::all();
        $musicas = Musica::all();
        return view('generos.create',[
            'albuns'=>$albuns,
            'musicas'=>$musicas
        ]);
    }

    public function store(Request $req){
        $novoGenero = $req -> validate([
            'designacao'=>['required','min:3','max:100'],
            'observacoes'=>['nullable','min:3','max:100']
        ]);
        $albuns = $req->id_album;
        $musicas = $req->id_musica;
        $genero = Genero::create($novoGenero);

        return redirect()->route('generos.show',[
            'id' => $genero->id_genero
        ]);
    }

}
