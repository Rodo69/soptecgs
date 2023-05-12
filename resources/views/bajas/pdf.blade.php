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
<header><img src="imagenes/head.png" alt="450" width="450" style="padding-left:15%  "></header>
<h2 class="titulo" style="text-align:center"> Lista de equipos obsoletos</h2>
<table class="table">
    <thead class="thead-dark">
            <tr>
                <th>-</th> 
                <br> 
                <th>Tipo</th>  
                <br> 
                <th>Modelo</th>
                <br> 
                <th>Marca</th>
                <br> 
                <th>Placa</th>
                <br> 
                <th>Serie</th>
                <br> 
                <br> 
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($equiposbaja as $equipobaja)
            <tr>
                <td>{{$equipobaja->id}}</td>
                <br> 
                <td>{{$equipobaja->tipo}}</td>
                <br> 
                <td>{{$equipobaja->modelo}}</td>
                <br> 
                <td>{{$equipobaja->marca}}</td>
                <br> 
                <td>{{$equipobaja->placa}}</td>
                <br> 
                <td>{{$equipobaja->serie}}</td>
                <br> 
                <br>
                <td>{{$equipobaja->descripcion}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <footer><img src="imagenes/firmaobsoleto.png"  alt="firma"  width="400" style="padding-left:22%; padding-top:95%"></footer>
</body>
</html>