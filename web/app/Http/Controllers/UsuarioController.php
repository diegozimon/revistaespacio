<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Ciudad;
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
            if($request){
                $usuarios=DB::table('usuarios')->orderBy('id','asc')->paginate(5);
                
                $ciudades=Ciudad::all();
                
                return view('revista.usuario.index', ['usuarios' => $usuarios, 'ciudades' => $ciudades]);
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
        $ciudades=Ciudad::all();
        return view("revista.usuario.create",['ciudades'=>$ciudades]);
    }    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $this->validate($request,[ 'username'=>'required', 'usermail'=>'required', 'password'=>'required', 'nombre'=>'required', 'apellido'=>'required', 'direccion'=>'required', 'ciudad_id'=>'required']);
        Usuario::create($request->all());
        return redirect()->route('usuarios.index')->with('success','Registro creado satisfactoriamente');
        
    
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
    public function edit($id)
    {
        error_log("[edit]");
        $usuario=Usuario::findOrFail($id);
        $ciudades=Ciudad::all();
        return view('revista.usuario.edit', ['usuario' => $usuario, 'ciudades' => $ciudades]);
    }

    public function update(Request $request, $id)    {
        error_log("[update]");

        $this->validate($request,
                    [ 'username'=>'required'],
                    [ 'usermail'=>'required'],
                    [ 'nombre'=>'required'],
                    [ 'apellido'=>'required'],
                    [ 'password'=>'required'],
                    [ 'direccion'=>'required'],
                    [ 'ciudad_id'=>'required']
                        );

        $usuario=Usuario::findOrFail($id);
        $usuario->username=$request->get('username');
        $usuario->usermail=$request->get('usermail');
        $usuario->nombre=$request->get('nombre');
        $usuario->apellido=$request->get('apellido');
        $usuario->password=$request->get('password');
        $usuario->direccion=$request->get('direccion');
        $usuario->ciudad_id=$request->get('ciudad_id');
        $usuario->update();

        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         Usuario::find($id)->delete();
        return redirect()->route('usuarios.index')->with('success','Registro eliminado satisfactoriamente');
    }
    
}
