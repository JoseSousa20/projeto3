<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $primaryKey="id_album";
    protected $table="albuns";

    public function musicos(){
        return $this->belongsTo(
            'App\Models\Musico',
            'id_musico'
        );
    }

    public function generos(){
        return $this->hasMany(
            'App\Models\Genero',
            'id_genero'
        );
    }

    public function musicas(){
        return $this->hasMany(
            'App\Models\Musica',
            'id_album'
        );
    }

    protected $fillable = [
        'titulo',
        'data_lancamento',
        'observacoes',
        'id_musico',
        'id_genero'
    ];

    protected $dates = [
        'data_lancamento'
    ];
}
