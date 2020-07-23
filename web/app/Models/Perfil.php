<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $fillable = [
        "tipo",
        "descripcion"
    ];

    public function usuarios(){
        return $this->belongsToMany("App\Models\Usuario");
    }

}
