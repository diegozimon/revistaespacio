<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    protected $fillable = [
        "titulo",
        "contenido",
        "imagen",
        "estado",
    ];

    public function categorias()
    {
        return $this->belongsToMany('App\Categoria');
    }
}