@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista de Perfiles de Usuarios</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{action('PerfilController@create')}}" class="btn btn-info" >Añadir nuevo Perfil</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>ID</th>
               <th>Tipo Perfil</th>
               <th>Descripcion</th>
               <th colspan="2">Opciones</th>
             </thead>
             <tbody>
              @if($perfiles->count())  
              @foreach($perfiles as $perfil)  
              <tr>
                <td>{{$perfil->id}}</td>
                <td>{{$perfil->tipo}}</td>
                <td>{{$perfil->descripcion}}</td>
                
                <td><a class="btn btn-primary btn-xs" href="{{action('PerfilController@edit', $perfil->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('PerfilController@destroy', $perfil->id)}}" method="post">
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
          @if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif
        </div>
      </div>
    </div>
  </div>
</section>

@endsection