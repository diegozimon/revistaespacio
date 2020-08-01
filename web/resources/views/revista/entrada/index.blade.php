
@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista de Publicaciones</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{action('EntradaController@create')}}" class="btn btn-info" >Añadir Publicación</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>ID</th>
               <th>Titulo</th>
               <th>Estado</th>
               <th>Creador</th>
               <th>Fecha de Creación</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($usuarios->count())  
              @foreach($entradas as $entrada)  
              <tr>
                <td>{{$entrada->id}}</td>
                <td>{{$entrada->titulo}}</td>
                <td>{{$entrada->estado}}</td>
                <td>
                @foreach($usuarios as $usuario)
                 
                @if(($usuario->id)==($entrada->usuario_id))
                {{$usuario->username}}
                @endif
                @endforeach
                </td>
                <td>{{$entrada->created_at}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('EntradaController@edit', $entrada->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('EntradaController@destroy', $entrada->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                      <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button></form>
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>
            
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection