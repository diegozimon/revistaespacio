@extends('layouts.layout')
@section('content')
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Editar Usuario</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
                        <form method="POST" action="{{action('UsuarioController@update', $usuario->id)}}"  role="form">
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="nombre" id="nombre" class="form-control input-sm" value="{{$usuario->nombre}}">
									</div>
								</div>
							</div>
                            <div class="row">
                                <div class="form-group">
							      <label for="ciudad_id">Ciudad</label>
                                  <select class="form-control" id="ciudad_id" name="ciudad_id">
                                  <option value="">Seleccione una ciudad</option>
                                        @foreach($ciudades as $ciudad)                                
                                            <option value="{{$ciudad->id}}">{{$ciudad->nombre}}</option>
                                        @endforeach
                                  </select>                              
							    </div>
                            </div>
							<div class="row">

								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
									<a href="{{action('UsuarioController@index')}}" class="btn btn-info btn-block" >Atrás</a>
								</div>	

							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</section>
	@endsection
