<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
//use web\Http\Request;
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
        try{
            //$usuarios=DB::table('usuarios')->orderBy('id','desc')->paginate(5);
            //$var = "asda";
            //error_log('Some message here.' . print_r($usuarios, true));
            //error_log('Some message here.' . $var);
            if($request){
                //$query=trim($request->get('searchText'));
                //$usuarios=DB::table('usuarios')->where('username','LIKE','%'.$query.'%')->orderBy('id','desc')->paginate(5);
                //error_log('Some message here. - 1');
                $usuarios=DB::table('usuarios')->orderBy('id','desc')->paginate(5);
                //error_log('Some message here. - 2');
                //foreach($usuarios as $usuario){                
                //    error_log('Some message here. - 3'.print_r($usuario, true));
                //}
                return view('revista.usuario.index', ['usuarios' => $usuarios]);
            }else{                
                return "Te estamos mirando usuario";
            }
        }
        catch(Exception $e)
        {
            return "Te estamos mirando asdasds";
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
        return Redirect::to('revista/usuario');
    
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
