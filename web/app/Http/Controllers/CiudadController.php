<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use Illuminate\Http\Request;
use DB;

class CiudadController extends Controller
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
        $ciudades=Ciudad::all();
        
        return view('revista.ciudad.index',['ciudades'=>$ciudades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view("revista.ciudad.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ 'nombre'=>'required']);
        Ciudad::create($request->all());
        return redirect()->route('ciudades.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("revista.ciudad.show",["ciudad"=>Ciudad::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $ciudad=Ciudad::findOrFail($id);
        return view('revista.ciudad.edit', ['ciudad' => $ciudad]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
                    [ 'nombre'=>'required']
                       );

        $ciudad=Ciudad::findOrFail($id);
        $ciudad->nombre=$request->get('nombre');
        $ciudad->update();

        return redirect()->route('ciudades.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ciudad::find($id)->delete();
        return redirect()->route('ciudades.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
