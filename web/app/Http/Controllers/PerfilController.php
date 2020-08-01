<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller
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
        $perfiles=Perfil::all();
        
        return view('revista.perfil.index',['perfiles'=>$perfiles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("revista.perfil.create");
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
                        ['tipo'=>'required'],
                        ['descripcion'=>'required']
                       );
        Perfil::create($request->all());
        return redirect()->route('perfiles.index')->with('success','Perfil creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perfil=Perfil::findOrFail($id);
        return view('revista.perfil.edit', ['perfil' => $perfil]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
                    [ 'tipo'=>'required'],
                    [ 'descripcion'=>'required']
                       );

        $pefil=Perfil::findOrFail($id);
        $pefil->tipo=$request->get('tipo');
        $pefil->descripcion=$request->get('descripcion');
        $pefil->update();

        return redirect()->route('perfiles.index')->with('success','Perfil actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Perfil::find($id)->delete();
        return redirect()->route('perfiles.index')->with('success','Perfil eliminado satisfactoriamente');
    }
}
