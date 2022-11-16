<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Habilidad</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1 class="display-5" >{{$title}}</h2>
    <p>Fecha: {{$date}}</p>
    
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Habilidad</th>
            <th>Descripcion</th>
            <th>Puntaje</th>
            <th>Usuario</th>
        </tr>
        @foreach($habilidad as $habilidad)
        <tr>
            <td>{{ $habilidad->id }}</td>
            <td>{{ $habilidad->nombre_habilidad }}</td>
            <td>{{ $habilidad->descripcion }}</td>
            <td>{{ $habilidad->puntaje }}</td>
            <td>{{ $habilidad->name }}</td>
        </tr>
        @endforeach
    </table>
</div>
 
</body>
</html>