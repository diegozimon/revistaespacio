<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;

class Perfil extends Model
{
    protected $fillable = [
        "tipo",
        "descripcion"
    ];

    public function usuarios(){
        return $this->belongsToMany(Usuario::class);
    }

}
