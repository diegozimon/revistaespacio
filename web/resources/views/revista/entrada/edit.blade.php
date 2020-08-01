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
					<h3 class="panel-title">Editar Entrada <strong>{{$entrada->titulo}}</strong> | ID: <strong>{{$entrada->id}}</strong></h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ action('EntradaController@update',$entrada->id) }}"  role="form">
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<label for="username">Titulo</label>
										<input type="text" name="titulo" id="titulo" class="form-control input-sm" value="{{$entrada->titulo}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="usuario_id">Usuario</label>
                                        <select class="form-control" id="usuario_id" name="usuario_id">
                                          <option value="">Seleccione un Usuario</option>
                                          @if($usuarios->count())  
                                            @foreach($usuarios as $usuario)
                                             <option value="{{$usuario->id}}">{{$usuario->username}}</option>
                                            @endforeach
                                          @endif
                                        </select>
                                    </div>
                                </div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<label for="imagen">Imágen</label><br>
									<img src="data:image/jpg;base64,{{base64_encode($entrada->imagen)}}"/>
									
										<input type="file" name="imagen" id="imagen" accept=".jpg,.png" value="{{$entrada->imagen}}"/>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									    <label for="estado">Estado</label>
										<select  class="form-control" name="estado" id="estado">
										 <option value="0">Seleccione estado</option>   
										 <option value="1">Publicado</option>   
										 <option value="2">En edición</option>   
										</select>
									</div>
								</div>
							</div>
							<div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
									        <div class="form-group">
									        <label for="usermail">Contenido</label>
										    <textarea name="contenido" id="contenido" class="form-control textarea-sm" rows="10" cols="200">{{$entrada->contenido}}</textarea>
									        </div>
								        
                                    </div>
                                </div>
							</div> 
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
									<a href="{{action('EntradaController@index')}}" class="btn btn-danger btn-block" >Atrás</a>
								</div>	
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</section>
	@endsection