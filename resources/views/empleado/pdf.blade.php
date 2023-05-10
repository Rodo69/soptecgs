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
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Telefono</th>
                    <th>N Colaborador</th>
                    <th>Sucursal</th>
                    <th>Unidad</th>
                    <th>Puesto</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $empleado)
            <tr>
                <td>{{ $empleado->id }}</td>
                <td>{{ $empleado->nombre_colaborador }}</td>
                <td>{{ $empleado->apellido_p }}</td>
                <td>{{ $empleado->apellido_m }}</td>
                <td>{{ $empleado->telefono }}</td>
                <td>{{ $empleado->numero_colaborador }}</td>
                <td>{{ $empleado->sucursales->nombre }}</td>
                <td>{{ $empleado->categoria->nombre }}</td>
                <td>{{ $empleado->puesto }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>