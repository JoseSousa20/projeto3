<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Auth;
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
        $generos = Genero::all();
        return view('albuns.create',[
            'musicos'=>$musicos,
            'generos'=>$generos
        ]);
    }

    public function store(Request $req){
        $novoAlbum = $req -> validate([
            'titulo'=>['required','min:3','max:100'],
            'data_lancamento'=>['required','date'],
            'observacoes'=>['nullable','min:3','max:100']
        ]);
        if (Auth::check()){
            $userAtual = Auth::user()->id;
            $novoAlbum['id_user']=$userAtual;
        }
        $novoAlbum['id_musico'] = $req->id_musico;
        $novoAlbum['id_genero'] = $req->id_genero;
        $album = Album::create($novoAlbum);
       
        return redirect()->route('albuns.show',[
            'id' => $album->id_album
        ]);
    }


    public function edit(Request $req){
        if(Gate::allows('admin')){
            $editAlbuns = $req->id;
            $album = Album::where('id_album', $editAlbuns)->with(['musicos', 'generos', 'musicas'])->first();
            $musicos = Musico::all();
            $generos = Genero::all();
            return view('albuns.edit',[
                'album'=>$album,
                'musicos'=>$musicos,
                'generos'=>$generos
            ]);
        } 
        else{
            return redirect()->route('albuns.index')
            ->with('msg','Não tem permissão para aceder a área pretendida');
        }
    }

    public function update(Request $req){
        $editAlbuns = $req ->id;
        $album = Album::where('id_album', $editAlbuns)->with(['musicos', 'generos', 'musicas'])->first();
        if(Gate::allows('admin')){
            $updateAlbum = $req -> validate([
                'titulo'=>['required','min:3','max:100'],
                'data_lancamento'=>['required','date'],
                'observacoes'=>['nullable','min:3','max:100']
            ]);
            $album->update($updateAlbum);

            return redirect()->route('albuns.show',[
                'id' => $album->id_album
            ]);
        }
        else{
            return redirect()->route('albuns.index')
            ->with('msg','Não tem permissão para aceder a área pretendida');
        }
    }

    public function delete(Request $req){
        $idAlbum = $req ->id;
        $album = Album::where('id_album',$idAlbum)->with(['musicos', 'generos', 'musicas'])->first();
        if(Gate::allows('admin')){
            if(is_null($album)){
                return redirect()->route('albuns.index')
                ->with('msg','O album nao existe');
            }
            else
            {
                return view('albuns.delete',[
                    'album'=>$album
                ]);
            }
        }
        
    }

    public function destroy(Request $req){
        $idAlbum= $req ->id;
        $album = Album::findOrfail($idAlbum);
        
        $album->delete();

        return redirect()->route('albuns.index')->with('msg','Album eliminado!');

    }
}
