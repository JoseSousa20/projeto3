<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $primaryKey="id_album";
    protected $table="albuns";

    public function musico(){
        return $this->belongsTo(
            'App\Models\Musico',
            'id_musico'
        );
    }
}
