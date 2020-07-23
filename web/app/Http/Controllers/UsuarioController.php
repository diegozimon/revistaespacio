<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use web\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request\UsuarioFormRequest;
use DB;
    

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        
    }
    
    public function index(Request $request)
    {
        return "Te estamos mirando usuario";
        
        if($request){
            $query=trim($request->get('searchText'));
            $usuarios=DB::table('usuarios')->where('username','LIKE','%'.$query.'%')->orderBy('id','desc')->paginate(5);
            return view('revista.usuario.index',["usuarios"=>$usuarios,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("revista.usuario.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioFormRequest $request)
    {
        $usuario=new Usuario;
        $usuario->username=$request->get('username');
        $usuario->usermail=$request->get('usermail');
        $usuario->password=$request->get('password');
        $usuario->nombre=$request->get('nombre');
        $usuario->apellido=$request->get('apellido');
        $usuario->direccion=$request->get('direccion');
        $usuario->ciudad_id=$request->get('ciudad_id');
        $usuario->save();
        eturn Redirect::to('revista/usuario')
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("revista.usuario.show",["usuario"=>Usuario::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id )
    {
        return view("revista.usuario.edit",["usuario"=>Usuario::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioFormRequest $request, $id)
    {
        $usuario=Usuario::findOrFail($id);
        $usuario->username=$request->get('username');
        $usuario->usermail=$request->get('usermail');
        $usuario->password=$request->get('password');
        $usuario->nombre=$request->get('nombre');
        $usuario->apellido=$request->get('apellido');
        $usuario->direccion=$request->get('direccion');
        $usuario->ciudad_id=$request->get('ciudad_id');
        $usuario->update();
        return Redirect::to('revista/usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}