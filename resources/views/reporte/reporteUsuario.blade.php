<!DOCTYPE html>
<html>
<head>
    <title>Pdf Usuarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h2>Clasificados por genero</h2>
    <h5>Masculino </h5>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Genero</th>
        </tr>
        @foreach($masculino as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->genero }}</td>
        </tr>
        @endforeach
    </table>

    <h5>Femenino </h5>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Genero</th>
        </tr>
        @foreach($femenino as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->genero }}</td>
        </tr>
        @endforeach
    </table>

    <h2>Clasificados por profesión </h2>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Profesion</th>
            <th>Email</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->direccion }}</td>
            <td>{{ $user->nombre_categoria }}</td>
            <td>{{ $user->email }}</td>
        </tr>
        @endforeach
    </table>
</div>
 
</body>
</html>