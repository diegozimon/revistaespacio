
@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista Usuarios</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="" class="btn btn-info" >Añadir Usuario</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>ID</th>
               <th>Username</th>
               <th>Mail</th>
               <th>Nombre</th>
               <th>Apellido</th>
               <th>Ciudad</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($usuarios->count())  
              @foreach($usuarios as $usuario)  
              <tr>
                <td>{{$usuario->id}}</td>
                <td>{{$usuario->username}}</td>
                <td>{{$usuario->usermail}}</td>
                <td>{{$usuario->nombre}}</td>
                <td>{{$usuario->apellido}}</td>
                <td>{{$usuario->ciudad_id}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('UsuarioController@edit', $usuario->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('UsuarioController@destroy', $usuario->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
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
      {{ $usuarios->links() }}
    </div>
  </div>
</section>

@endsection