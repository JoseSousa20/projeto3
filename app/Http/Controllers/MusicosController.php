<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\Models\Musico;
use App\Models\Album;
use App\Models\Musica;

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
        if (Auth::check()){
            $userAtual = Auth::user()->id;
            $novoMusico['id_user']=$userAtual;
        }
        $albuns = $req->id_album;
        $musicas = $req->id_musica;
        $musico = Musico::create($novoMusico);

        return redirect()->route('musicos.show',[
            'id' => $musico->id_musico
        ]);
    }

    public function edit(Request $req){
        if(Gate::allows('admin')){
            $editMusico = $req->id;
            $musico = Musico::where('id_musico',$editMusico)->with(['albuns', 'musica'])->first();
            return view('musicos.edit',[
                'musico'=>$musico
            ]);
        } 
        else{
            return redirect()->route('musicos.index')
            ->with('msg','Não tem permissão para aceder a área pretendida');
        }
        
        
       
    }

    public function update(Request $req){
        $idMusico = $req ->id;
        $musico = Musico::where('id_musico',$idMusico)->with(['albuns', 'musica'])->first();
        if(Gate::allows('admin')){
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
        else{
            return redirect()->route('musicos.index')
            ->with('msg','Não tem permissão para aceder a área pretendida');
        }

    }


    public function delete(Request $req){
        $idMusico = $req ->id;
        $musico = Musico::where('id_musico',$idMusico)->with(['albuns', 'musica'])->first();
        if(Gate::allows('admin')){
            if(is_null($musico)){
                return redirect()->route('musicos.index')
                ->with('msg','O musico nao existe');
            }
            else
            {
                return view('musicos.delete',[
                    'musico'=>$musico
                    ]);
            }
        }
        else
        {
            return redirect()->route('musicos.index')
            ->with('msg','Não tem permissão para aceder a área pretendida');
        }
        
        
    }

    public function destroy(Request $req){
        $idMusico = $req ->id;
        $musico = Musico::findOrfail($idMusico);
        
        $musico->delete();

        return redirect()->route('musicos.index')->with('msg','Musico eliminado!');

    }
}
