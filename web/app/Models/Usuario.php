<?php

namespace App\Models;

use App\Models\Perfil;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class Usuario extends Authenticatable
{
    use Notifiable;
     protected $table = 'usuarios';

    
    protected $fillable = [
        "username",
        "usermail",
        "password",
        "nombre",
        "apellido",
        "direccion",
        "ciudad_id",
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    protected $casts = [
        'usermail_verified_at' => 'datetime',
    ];
    
    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
        
    }

    public function perfils(){
        return $this->belongsToMany(Perfil::class);
    }
    
    public function authorizeRoles($roles)
    {
        abort_unless($this->hasAnyRole($roles), 401);
        return true;
    }
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                 return true; 
            }   
        }
        return false;
    }
    
    public function hasRole($role)
    {
        if ($this->roles()->where('id', $role)->first()) {
            return true;
        }
        return false;
    }
}
