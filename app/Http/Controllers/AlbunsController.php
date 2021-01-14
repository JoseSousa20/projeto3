<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Musico;
use App\Models\Genero;
use App\Models\Musica;

class AlbunsController extends Controller
{
    //

    public function index(){
        $albuns = Album::all();
        return view('albuns.index',[
            'albuns' => $albuns
        ]);
    }

    public function show(Request $req){
        $idAlbum = $req ->id;
        
        $album = Album::where('id_album',$idAlbum)->with(['musicos', 'generos', 'musicas'])->first();

        return view('albuns.show', [
            'album' =>$album 
        ]);
    }

    public function create(){
        $musicos = Musico::all();
        $musicas = Musica::all();
        $generos = Genero::all();
        return view('albuns.create',[
            'musicos'=>$musicos,
            'musicas'=>$musicas,
            'generos'=>$generos
        ]);
    }

    public function store(Request $req){
        $novoAlbum = $req -> validate([
            'titulo'=>['required','min:3','max:100'],
            'data_lancamento'=>['required','date'],
            'observacoes'=>['nullable','min:3','max:100']
        ]);
        $novoAlbum['id_musica'] = $req->id_musica;
        $novoAlbum['id_musico'] = $req->id_musico;
        $novoAlbum['id_genero'] = $req->id_genero;
        $album = Alnum::create($novoAlbum);
       
        return redirect()->route('albuns.show',[
            'id' => $album->id_album
        ]);
    }
}
