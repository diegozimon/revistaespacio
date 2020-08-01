<!DOCTYPE HTML>
<!--
	Visualize by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Revista Spacio</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    @if( auth()->check() )
    <a class="navbar-brand" href="#">
               <img class="mb-4" src="{{asset('img/logoblanco.png')}}" alt="logo" width="90px">
               </a></div>
    <ul class="nav navbar-nav">
      <li><a class="nav-link" href="/" class="btn btn-primary">Bienvenido  !</a></li>
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
	
	@yield('content')
	
				<!-- Footer -->
					<footer id="footer">
						<p>&copy; Untitled. All rights reserved. Design: <a href="http://templated.co">TEMPLATED</a>. Demo Images: <a href="http://unsplash.com">Unsplash</a>.</p>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/main.js"></script>

<style type="text/css">
	.table {
		border-top: 2px solid #ccc;
 
	}
</style>
	</body>
</html>