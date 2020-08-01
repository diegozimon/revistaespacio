<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>REVISTA</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <style>
            html, body {
                background-color: #fff;
                color: #fff;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                background-color: #000;
		background-image: url("../../images/bg.jpg");
		background-size: cover;
		background-position: top center;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #fff;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
       <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    @if( auth()->check() )
    <a class="navbar-brand" href="#">
               <img class="mb-4" src="{{asset('img/logoblanco.png')}}" alt="logo" width="90px">
               </a></div>
    <ul class="nav navbar-nav">
      <li><a class="nav-link" href="#" class="btn btn-primary">Bienvenido  !</a></li>
    </ul>
    
    <ul class="nav navbar-nav navbar-right">
      <li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
    @else               
      <a class="navbar-brand" href="#">
               <img class="mb-4" src="{{asset('img/logoblanco.png')}}" alt="logo" width="90px">
               </a>
               </div>
    <ul class="nav navbar-nav">
      <li><a href="/">Inicio</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="/registro"><span class="glyphicon glyphicon-user"></span> Registro</a></li>
      <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
    @endif
    
  </div>
</nav>
        <div class="flex-center position-ref full-height">
           

            <div class="content">
               <img class="mb-4" src="{{asset('img/logo.png')}}" alt="logo" width="120px">
                <div class="title m-b-md">
                    Revista Spacio Console
                </div>
             @if( auth()->check() )
                <div class="links">
                    <a href="http://127.0.0.1:8000/">Inicio</a>
                    <a href="http://127.0.0.1:8000/home">Home</a>
                    <a href="http://127.0.0.1:8000/usuarios">Usuarios</a>
                    <a href="http://127.0.0.1:8000/ciudades">Ciudades</a>
                    <a href="http://127.0.0.1:8000/categorias">Categorias</a>
                    <a href="http://127.0.0.1:8000/entradas">Publicaciones</a> <a href="http://127.0.0.1:8000/perfiles">Perfiles</a>
                </div>
                @endif
            </div>
        </div>
    </body>
</html>
