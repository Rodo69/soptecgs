<!DOCTYPE html>
<html lang="en">
<head>
    @extends('layouts.appinventario')
    @section('content')
    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{Session::get('mensaje')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="container">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EQUIPOS</title>
</head>
<body>
    <a href="{{url('equipos/create')}}" class="btn btn-success">Registrar Nuevo Equipo</a>
    <a href="{{url('equipo/pdf')}}" class="btn btn-success">GenerarPDF</a>
<br><br>
<table class="table table-light">
    <thead class="thead-light">
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
            <th>Acciones</th>
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
            <td>
            <a href="{{url('/equipos/'.$equipo->id.'/edit')}}" class="btn btn-warning">Editar</a>    | 
            <a href="{{url('/equipo/'.$equipo->id)}}" class="btn btn-warning">PDF B</a>    |  
            <a href="{{url('/equipo/'.$equipo->id)}}" class="btn btn-warning">PDF A</a>    |  
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
{!!$equipos->Links()!!}
</div>
@endsection
</body>
</html>