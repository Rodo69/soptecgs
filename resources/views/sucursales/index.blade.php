<!DOCTYPE html>
<html lang="en">
<head>
    @extends('layouts.appinventario')
    @section('content')
    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="myAlert" >
    {{Session::get('mensaje')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"></span>
        </button>
        <script>
            // Obtén la referencia a la alerta
            var alerta = document.getElementById('myAlert');
          
            // Cierra la alerta después de 5 segundos (5000 milisegundos)
            setTimeout(function() {
              alerta.classList.add('fade');
              alerta.classList.add('show');
              alerta.style.display = 'none';
            }, 3000);
          </script>
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
            <a href="{{url('/sucursales/'.$sucursal->id.'/edit')}}"  class="btn btn-warning">Editar</a>    | 
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar">
                Eliminar
            </button>
  
  <!-- Modal -->
  <div class="modal fade" id="eliminar" tabindex="-1" aria-labelledby="eliminar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="eliminar">¿Seguro que quiere eliminar?</h5>
          
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <form action="{{url('/sucursales/'.$sucursal->id)}}" class="d-inline" method="post">
            @csrf    
            {{method_field('DELETE')}}
            <input type="submit" class="btn btn-danger">
            </form>
        </div>
      </div>
    </div>
  </div>

        </tr>
        @endforeach
    </tbody>
</table>
{!!$sucursales->Links()!!}
</div>
@endsection
</body>
</html>