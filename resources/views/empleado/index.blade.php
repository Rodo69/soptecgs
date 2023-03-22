<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{url('empleado/create')}}" class="btn btn-success">Registrar Nuevo Empleado</a>
<br><br>
<table class="table table-light">
    <thead class="thead-light">
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
            <td>{{$empleado->id}}</td>
            <td>{{$empleado->nombre_colaborador}}</td>
            <td>{{$empleado->apellido_p}}</td>
            <td>{{$empleado->apellido_m}}</td>
            <td>{{$empleado->telefono}}</td>
            <td>{{$empleado->numero_colaborador}}</td>
            <td>{{$empleado->sucursal_asignada}}</td>
            <td>{{$empleado->unidad_asignada}}</td>
            <td>{{$empleado->puesto}}</td>
            <td>
            <a href="{{url('/empleado/'.$empleado->id.'/edit')}}" class="btn btn-warning">Editar</a>    | 

            <form action="{{url('/empleado/'.$empleado->id)}}" class="d-inline" method="post">
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