

<h3>Index</h3>
<table id="example1" width="100%">
    <thead class="thead-default">
    <tr>
        <th>ID</th>
        <th>Usuario</th>
        <th>Correo</th>
    </tr>
    </thead>
    <tbody>
	@foreach($usuarios as $usuario)
    <tr>
        <td>{{ $usuario->id }}</td>
        <td>{{ $usuario->username }}</td>
        <td>{{ $usuario->usermail }}</td>
    </tr>
	@endforeach
    </tbody>
</table>

