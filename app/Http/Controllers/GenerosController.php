<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Auth;
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
        if (Auth::check()){
            $userAtual = Auth::user()->id;
            $novoGenero['id_user']=$userAtual;
        }
        $albuns = $req->id_album;
        $musicas = $req->id_musica;
        $genero = Genero::create($novoGenero);

        return redirect()->route('generos.show',[
            'id' => $genero->id_genero
        ]);
    }

    
    public function edit(Request $req){
        if(Gate::allows('admin')){
            $editGenero = $req->id;
            $genero = Genero::where('id_genero',$editGenero)->with(['albuns', 'musicas'])->first();

            $albuns = Album::all();
            $musicas = Musica::all();
    

            return view('generos.edit',[
                'genero'=>$genero,
                'musicas'=>$musicas,
                'albuns'=>$albuns
            ]);
        } 
        else{
            return redirect()->route('generos.index')
            ->with('msg','Não tem permissão para aceder a área pretendida');
        }
    }

    public function update(Request $req){
        $editGenero = $req ->id;
        $genero = Genero::where('id_genero',$editGenero)->with(['albuns', 'musicas'])->first();
        if(Gate::allows('admin')){
            $updateGenero = $req -> validate([
                'designacao'=>['required','min:3','max:100'],
                'observacoes'=>['nullable','min:3','max:100']
            ]);
            $genero->update($updateGenero);

            return redirect()->route('generos.show',[
                'id' => $genero->id_genero
            ]);
        } 
        else{
            return redirect()->route('generos.index')
            ->with('msg','Não tem permissão para aceder a área pretendida');
        }
    }

    public function delete(Request $req){
        $idGenero = $req ->id;
        $genero = Genero::where('id_genero',$idGenero)->with(['albuns', 'musicas'])->first();
        if(Gate::allows('admin')){
            if(is_null($album)){
                return redirect()->route('generos.index')
                ->with('msg','O genero nao existe');
            }
            else
            {
                return view('generos.delete',[
                    'genero'=>$genero
                ]);
            }
        }
        
    }

    public function destroy(Request $req){
        $idGenero= $req ->id;
        $genero = Genero::findOrfail($idGenero);
        
        $genero->delete();

        return redirect()->route('generos.index')->with('msg','Genero eliminado!');

    }

}
