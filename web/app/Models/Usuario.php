<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        "username",
        "usermail",
        "password",
        "nombre",
        "apellido",
        "direccion",
        "ciudad_id",
    ];

    public function perfils(){
        return $this->belongsToMany("App\Models\Perfil");
    }
}
