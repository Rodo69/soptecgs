<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
<header class="text-center">
    <img src="imagenes/head.png" alt="450" width="450">
</header>
<h2 class="titulo text-center">Lista de equipos obsoletos</h2>
<table class="table table-striped text-center">
    <thead class="thead-dark">
        <tr>
            <th>-</th>
            <th>Tipo</th>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Placa</th>
            <th>Serie</th>
            <th>Descripción</th>
        </tr>
    </thead>
    <tbody>
        @foreach($equiposbaja as $equipobaja)
        <tr>
            <td>{{$equipobaja->id}}</td>
            <td>{{$equipobaja->tipo}}</td>
            <td>{{$equipobaja->modelo}}</td>
            <td>{{$equipobaja->marca}}</td>
            <td>{{$equipobaja->placa}}</td>
            <td>{{$equipobaja->serie}}</td>
            <td>{{$equipobaja->descripcion}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<footer class="text-center" style="position: fixed; bottom: 0; left: 50%; transform: translateX(-50%);">
    <img src="imagenes/firmaobsoleto.png" alt="firma" width="400">
</footer>
</body>
</html>