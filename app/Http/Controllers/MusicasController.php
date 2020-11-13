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
}
