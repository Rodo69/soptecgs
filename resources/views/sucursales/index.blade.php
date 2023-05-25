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
    <title> SUCURSALES </title>
</head>
<body>
    <a href="{{url('sucursales/create')}}" class="btn btn-outline-primary">Registrar Nueva Sucursal</a>
<br><br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>        
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Ingeniero</th>
            <th>Telefono</th>
            <th>Gerente</th>
            <th>Telefono</th>
            <th>Unidad</th>
            <th>Unidad</th>
            <th>Unidad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sucursales as $sucursal)
        <tr>
            <td>{{$sucursal->id}}</td>
            <td>
                <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$sucursal->imagen}}" width="120" alt="" srcset="">
            </td>
            <td>{{$sucursal->nombre}}</td>
            <td>{{$sucursal->direccion}}</td>
            <td>{{$sucursal->ingeniero_zona}}</td>
            <td>{{$sucursal->telefono_ing}}</td>
            <td>{{$sucursal->gerente_tienda}}</td>
            <td>{{$sucursal->telefono_gerente}}</td>
            <td>{{$sucursal->categoria->nombre}}</td>
            <td>{{$sucursal->categoria1->nombre}}</td>
            <td>{{$sucursal->categoria2->nombre}}</td>
            <td>
            <a href="{{url('/sucursales/'.$sucursal->id.'/edit')}}" class="btn btn-warning">Editar</a>    | 

            <form action="{{url('/sucursales/'.$sucursal->id)}}" class="d-inline" method="post">
            @csrf    
            {{method_field('DELETE')}}
            <input type="submit" class="btn btn-danger" onClick="return confirm('¿Quieres borrar?')" value="Borrar">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!!$sucursales->Links()!!}
</div>
@endsection
</body>
</html>