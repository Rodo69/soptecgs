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
    <title>Document</title>
</head>
<body>

    <a href="{{url('bajas/create')}}" class="btn btn-warning">Agregar</a>
    <a href="{{url('bajas/pdf')}}" class="btn btn-dark">PDF</a>
  <br>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>-</th>
            <th>Foto</th>        
            <th>Tipo</th>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Placa</th>
            <th>Serie</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($equiposbaja as $equipobaja)
        <tr>
            <td>{{$equipobaja->id}}</td>
            <td>
                <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$equipobaja->foto_obsoleto}}" width="120" alt="" srcset="">
            </td>
            <td>{{$equipobaja->tipo}}</td>
            <td>{{$equipobaja->modelo}}</td>
            <td>{{$equipobaja->marca}}</td>
            <td>{{$equipobaja->placa}}</td>
            <td>{{$equipobaja->serie}}</td>
            <td>{{$equipobaja->descripcion}}</td>
            <td>
                
            <a href="{{url('/bajas/'.$equipobaja->id.'/edit')}}" class="btn btn-primary">Editar</a>    | 

            <form action="{{url('/bajas/'.$equipobaja->id)}}" class="d-inline" method="post">
            @csrf    
            {{method_field('DELETE')}}
            <input type="submit" class="btn btn-danger" onClick="return confirm('¿Quieres borrar?')" value="Borrar">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!!$equiposbaja->Links()!!}
</div>
@endsection
</body>
</html>