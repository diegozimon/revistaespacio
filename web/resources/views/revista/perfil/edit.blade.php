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
					<h3 class="panel-title">Editar Perfil <strong>{{$perfil->tipo}}</strong> | ID: <strong>{{$perfil->id}}</strong></h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ action('PerfilController@update',$perfil->id) }}"  role="form">
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<label for="Tipo">Nombre</label>
										<input type="text" name="tipo" id="tipo" class="form-control input-sm" value="{{$perfil->tipo}}">
									</div>
								</div>
                               <div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<label for="descripcion">Descrirpción</label>
										<input type="text" name="descripcion" id="descripcion" class="form-control input-sm" value="{{$perfil->descripcion}}">
									</div>
								</div>
                            </div>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
									<a href="{{action('PerfilController@index')}}" class="btn btn-danger btn-block" >Atrás</a>
								</div>	

							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</section>
	@endsection