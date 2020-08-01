@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista de Ciudades</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{action('CiudadController@create')}}" class="btn btn-info" >Añadir nueva Ciudad</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>ID</th>
               <th>Ciudad</th>
               <th colspan="2">Opciones</th>
             </thead>
             <tbody>
              @if($ciudades->count())  
              @foreach($ciudades as $ciudad)  
              <tr>
                <td>{{$ciudad->id}}</td>
                <td>{{$ciudad->nombre}}</td>
                
                <td><a class="btn btn-primary btn-xs" href="{{action('CiudadController@edit', $ciudad->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('CiudadController@destroy', $ciudad->id)}}" method="post">
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