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
    <title> SERVIDORES </title>
</head>
<body>
    <a href="{{route('servidores.create')}}" class="btn btn-outline-primary">Registar un servidor</a>

<br><br>
<table class="table table-light">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Sucursal asignada</th>
        <th scope="col">IP</th>
        <th scope="col">MASCARA</th>
        <th scope="col">GATEWAY</th>
        <th scope="col">DNS</th>
        <th scope="col">Status</th>
        <th scope="col">Imagen</th>
      </tr>
    </thead>
    <tbody>
              @foreach ($servidores as $servidor)
        <tr>
          <td><a href="{{route('servidores.show', $servidor->id)}}">{{$servidor->id}}</td>
          <td>{{$servidor->nombre}}</td>
          <td>{{$servidor->sucursales->nombre}}</td>
          <td>{{$servidor->ip}}</td>
          <td>{{$servidor->mascara}}</td>
          <td>{{$servidor->gateway}}</td>
          <td>{{$servidor->dns}}</td>
          <td>{{$servidor->status}}</td>
          <td>
            <img class="img-thumbnail img-fluid" src="{{asset($servidor->imagen)}}" width="100" alt="" srcset="">
        </td>
          <td>    
          <a href="{{route('servidores.edit', $servidor->id)}}" class="btn btn-primary">Editar</a>

          <form action="{{route('servidores.destroy', $servidor)}}" method="POST">
            @csrf
            @method('delete')
            <br><button type="submit" class="btn btn-danger" onClick="return confirm('¿Eliminar definitivamente?')">Eliminar</button>
          </form>
          </td>
        </tr>

        @endforeach
    </tbody>
</table>
{!!$servidores->Links()!!}
</div>
@endsection
</body>
</html>