<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Usuario;
use Illuminate\Http\Request;
use DB;

class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        
    }
    
    public function index()
    {
         $entradas=DB::table('entradas')->orderBy('id','asc')->paginate(5);
                
                $usuarios=Usuario::all();
                
                return view('revista.entrada.index', ['entradas' => $entradas, 'usuarios' => $usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios=Usuario::all();
                
        return view('revista.entrada.create', ['usuarios' => $usuarios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
                    [ 'titulo'=>'required'],
                    [ 'contenido'=>'required'],
                    [ 'imagen'=>'required'],
                    [ 'estado'=>'required'],
                    [ 'usuario_id'=>'required']
                        );
        
        Entrada::create($request->all());
        
        return redirect()->route('contenidos.index')->with('success','Contenido creado satisfactoriamente');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("revista.contenido.show",["contenido"=>Contenido::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entrada=Entrada::findOrFail($id);
        $usuarios=Usuario::all();
        return view('revista.entrada.edit', ['entrada' => $entrada, 'usuarios' => $usuarios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
                    [ 'titulo'=>'required'],
                    [ 'contenido'=>'required'],
                    [ 'imagen'=>'required'],
                    [ 'estado'=>'required'],
                    [ 'usuario_id'=>'required']
                        );

        $entrada=Entrada::findOrFail($id);
        $entrada->titulo=$request->get('titulo');
        $entrada->contenido=$request->get('contenido');
        $entrada->imagen=$request->get('imagen');
        $entrada->estado=$request->get('estado');
        $entrada->usuario_id=$request->get('usuario_id');
        $entrada->update();

        return redirect()->route('entradas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Entrada::find($id)->delete();
        return redirect()->route('entradas.index')->with('success','Contenido eliminado satisfactoriamente');
    }
}
