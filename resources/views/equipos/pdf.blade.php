<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <header><img src="imagenes/head.png" alt="450" width="450" style="padding-left:30%  "></header>
    <table class="table table-striped">

        <thead>
            <tr>
                <th>#</th>
                <th>Tipo</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Serie</th>
                <th>Placa</th>
                <th>Empleado</th>
                <th>Sucursal</th>
                <th>Unidad</th>
                <th>Equipo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($equipos as $equipo)
            <tr>
            <td>{{$equipo->id}}</td>
            <td>{{$equipo->tipo}}</td>
            <td>{{$equipo->marca}}</td>
            <td>{{$equipo->modelo}}</td>
            <td>{{$equipo->serie}}</td>
            <td>{{$equipo->placa}}</td>
            <td>{{$equipo->empleados->nombre_colaborador}}</td>
            <td>{{$equipo->sucursales->nombre}}</td>
            <td>{{$equipo->categoria->nombre}}</td>
            <td>{{$equipo->nombre_equipo}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>