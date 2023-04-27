
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
</head>
<body>
  
<h2>Lista de equipos obsoletos</h2>
    <table class="table table-light">
        <thead class="thead-light">
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
</body>
</html>