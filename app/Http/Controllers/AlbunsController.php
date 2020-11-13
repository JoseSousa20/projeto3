<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

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
        
        $album = Album::where('id_album',$idAlbum)->first();

        return view('albuns.show', [
            'album' =>$album 
        ]);
    }
}
