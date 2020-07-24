<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        "tipo"
    ];

    public function entradas(){
        return $this->belongsToMany('App\Entrada');
    }
}
