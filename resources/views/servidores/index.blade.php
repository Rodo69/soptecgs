@extends('layouts.fondo')

@section('title', 'Servidor')

@section('micontent')

<a href="{{route('servidores.create')}}" class="btn btn-outline-primary">Registar un servidor</a>

<a href="home" class="btn btn-outline-primary">Regresar</a>

<table class="table">
    {{-- <caption>{{$servidores->links()}} </caption> --}}
    <thead class="thead-dark">
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
@foreach ($servidores as $servidor)
<tr>
  <td><a href="{{route('servidores.show', $servidor->id)}}">{{$servidor->id}}</td>
  <td>{{$servidor->nombre}}</td>
  <td>{{$servidor->sucursalasig}}</td>
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

@endsection