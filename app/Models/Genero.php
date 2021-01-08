<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;

    protected $primaryKey="id_genero";
    protected $table="generos";

    public function albuns(){
        return $this->belongsTo(
            'App\Models\Album',
            'id_genero'
        );
    }

    public function musicas(){
        return $this->hasMany(
            'App\Models\Musica',
            'id_genero'
        );
    }

    protected $fillable = [
        'designacao',
        'observacoes'
    ];
}
