@extends('layouts.layout')
@section('content')

<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Editar Usuario <strong>{{$usuario->username}}</strong> | ID: <strong>{{$usuario->id}}</strong></h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ action('UsuarioController@update',$usuario->id) }}"  role="form">
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<label for="username">Nombre de Usuario</label>
										<input type="text" name="username" id="username" class="form-control input-sm" value="{{$usuario->username}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<label for="usermail">Mail</label>
										<input type="text" name="usermail" id="usermail" class="form-control input-sm" value="{{$usuario->usermail}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<label for="Nombre">Nombre</label>
										<input type="text" name="nombre" id="nombre" class="form-control input-sm" value="{{$usuario->nombre}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									    <label for="apellido">Apellido</label>
										<input type="text" name="apellido" id="apellido" class="form-control input-sm" value="{{$usuario->apellido}}">
									</div>
								</div>
							</div>
							<div class="form-group">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="password">Contraseña</label>
										<input type="password" name="password" id="passwrod" class="form-control input-sm" value="{{$usuario->password}}">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="direccion">Dirección</label>
										<input type="text" name="direccion" id="direccion" class="form-control input-sm" value="{{$usuario->direccion}}">
                                    </div>
                                </div>	
							</div> 
							<div class="form-group">
							  <label for="ciudad_id">Ciudad</label>
                              <select class="form-control" id="ciudad_id" name="ciudad_id">
                              <option value="">Seleccione una ciudad</option>
                              @if($ciudades->count())  
                            @foreach($ciudades as $ciudad)
                                
                                <option value="{{$ciudad->id}}">{{$ciudad->nombre}}</option>
                            @endforeach
                             @endif
                              </select>
                              
							</div>
							<div class="row">

								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
									<a href="{{action('UsuarioController@index')}}" class="btn btn-danger btn-block" >Atrás</a>
								</div>	

							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</section>
	@endsection