<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{url('equipos/create')}}" class="btn btn-success">Registrar Nuevo Equipo</a>
<br><br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>        
            <th>Tipo</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Serie</th>
            <th>Placa</th>
            <th>Empleado</th>
            <th>Sucursal</th>
            <th>Unidad</th>
            <th>Equipo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($equipos as $equipo)
        <tr>
            <td>{{$equipo->id}}</td>
            <td>
                <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$equipo->foto_equipo}}" width="120" alt="" srcset="">
            </td>
            <td>{{$equipo->tipo}}</td>
            <td>{{$equipo->marca}}</td>
            <td>{{$equipo->modelo}}</td>
            <td>{{$equipo->serie}}</td>
            <td>{{$equipo->placa}}</td>
            <td>{{$equipo->empleado_asig}}</td>
            <td>{{$equipo->sucursal_asig}}</td>
            <td>{{$equipo->unidad_asig}}</td>
            <td>{{$equipo->nombre_equipo}}</td>
            <td>
            <a href="{{url('/equipos/'.$equipo->id.'/edit')}}" class="btn btn-warning">Editar</a>    | 

            <form action="{{url('/equipos/'.$equipo->id)}}" class="d-inline" method="post">
            @csrf    
            {{method_field('DELETE')}}
            <input type="submit" class="btn btn-danger" onClick="return confirm('¿Quieres borrar?')" value="Borrar">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>