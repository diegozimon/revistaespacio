<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport"
	content="width=device-width, initial-scale=1, user-scalable=yes">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<style>body {
		background-color: #000;
		background-image: url("../../images/bg.jpg");
		background-size: cover;
		background-position: top center;
	}</style>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    @if( auth()->check() )
    
    <a class="navbar-brand" href="#"> <img class="mb-4" src="{{asset('img/logoblanco.png')}}" alt="logo" width="90px"></a>
     
      </div>
        <ul class="nav navbar-nav">
      <li><a href="/">Inicio</a></li>
      <li><a href="/usuarios">Usuarios</a></li>
      <li><a href="/entradas">Publicaciones</a></li>
      <li><a href="/ciudades">Ciudades</a></li>
      <li><a href="/categorias">Categorias</a></li>
    </ul>
    <ul class="nav navbar-nav nav navbar-nav navbar-right">
      <li><a class="nav-link" href="#" class="btn btn-primary">Bienvenido  !</a></li>
      <li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
    @else               
      <a class="navbar-brand" href="#"> <img class="mb-4" src="{{asset('img/logoblanco.png')}}" alt="logo" width="90px"></a>
      </div>
        <ul class="nav navbar-nav">
      <li><a href="/">Inicio</a></li>
    </ul>
    @endif
    
  </div>
</nav>

	<div class="container-fluid" style="margin-top: 100px">
     <div class="row">
         <section class="content">
             <div class="">
            <div class="btn-group">
              <a href="http://127.0.0.1:8000/" class="btn btn-info" >Volver al Inicio</a>
            </div>
          </div>
         </section>
     </div>
 
		@yield('content')
		
		
	</div>
	<style type="text/css">
	.table {
		border-top: 2px solid #ccc;
 
	}
</style>
</body>
</html>