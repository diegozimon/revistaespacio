<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;
use App\Models\Usuario;
use App\Models\Ciudad;
use Auth;

class RegistroController extends Controller
{
    public function create(){
        $ciudades=Ciudad::all();
        return view('revista.registro.create',['ciudades'=>$ciudades]);
    }
    
    public function store(){
        $this->validate(request(),[
           'username'=>'required', 
           'usermail'=>'required',
           'password'=>'required', 
           'nombre'=>'required', 
           'apellido'=>'required', 
           'direccion'=>'required', 
           'ciudad_id'=>'required', 
        ]);
        
        $usuario=Usuario::create(Request(['username','usermail','password','nombre','apellido','direccion','ciudad_id']));
        return redirect()->to('/');
    }
    
}
