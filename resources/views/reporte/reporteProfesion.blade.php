<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Profesion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1 class="display-5" >{{$title}}</h2>
    <p>Fecha: {{$date}}</p>
    
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Genero</th>
            <th>Profesion</th>
        </tr>
        @foreach($profesion as $profesion)
        <tr>
            <td>{{ $profesion->id }}</td>
            <td>{{ $profesion->name }}</td>
            <td>{{ $profesion->genero }}</td>
            <td>{{ $profesion->nombre_categoria  }}</td>
        </tr>
        @endforeach
    </table>
</div>
 
</body>
</html>