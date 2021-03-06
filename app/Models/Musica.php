<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musica extends Model
{
    use HasFactory;

    protected $primaryKey="id_musica";
    protected $table="musicas";


    public function musicos(){
        return $this->belongsTo(
            'App\Models\Musico',
            'id_musico'
        );
    }

    public function albuns(){
        return $this->belongsTo(
            'App\Models\Album',
            'id_album'
        );
    }

    public function genero(){
        return $this->belongsTo(
            'App\Models\Genero',
            'id_genero'
        );
    }
    protected $fillable = [
        'titulo',
        'id_genero',
        'id_musico',
        'id_album'
    ];


    public function user(){
        return $this->belongsTo(
            'App\Models\User', 
            'id_user'
        ); 
    }
}
