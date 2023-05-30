@extends('layouts.appinventario')
@section('content')
<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>
@if(Session('mensaje') == 'eliminado')
<script>
    Swal.fire(
                  '¡Eliminado!',
                  'El registro se elimino con éxito',
                  'success'
                )
    </script>
@endif
  
<h3 class="text-center">Equipo obsoleto </h3>
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{url('bajas/create')}}" class="btn btn-warning">Agregar</a>
                <a href="{{url('bajas/pdf')}}" class="btn btn-dark">PDF <i class="bi bi-file-earmark-pdf"></i></a>
            </div>
            <div class="col">
                <form action="{{ route('bajas.index') }}" method="get" class="form-inline justify-content-end">
                    <div class="input-group">
                        <input type="text" name="busqueda" class="form-control mr-2" placeholder="Buscar placa o serie...">
                        <div class="input-group-append">
                            <button class="btn btn-outline-dark" type="submit"><i class="bi bi-search"></i></button>
                            <a href="{{ route('bajas.index') }}" class="btn btn-outline-danger ml-2"><i class="bi bi-x-circle"></i></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
<br>
    <table class="table table-striped table-sm text-center">
     
        <thead class="thead-dark">
            <tr>
            <th>-</th>
            <th>Evidencia</th>        
            <th>Tipo</th>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Placa</th>
            <th>Serie</th>
            <th>Fecha de registro</th>
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
            <td>{{$equipobaja->fecha_registro}}</td>
            <td>{{$equipobaja->descripcion}}</td>
            <td> 
                <a href="{{url('/bajas/'.$equipobaja->id.'/edit')}}" class="btn btn-dark">
                    <i class="bi bi-pencil-square"></i>
                </a>
                
            <form action="{{url('/bajas/'.$equipobaja->id)}}" class="d-inline formulario-eliminar" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button type="submit" class="btn btn-danger" ">
                    <i class="bi bi-trash"></i> 
                </button>
                <a href="{{route('bajas.show', $equipobaja->id)}}" class="btn btn-dark">
                    <i class="bi bi-eye"></i>
                </a>
            </form>
            </td>
        </tr>
        <script>

            $('.formulario-eliminar').submit(function(e){
                e.preventDefault();

              Swal.fire({
              title: '¿Estas seguro?',
              text: "Este registro se eliminará definitivamente",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, Eliminar',
              cancelButtonText:'Cancelar',
            }).then((result) => {
              if (result.isConfirmed) {
                this.submit();
              }
            })
        }); 
            </script>
    
        @endforeach

    </tbody>
</table>
<div class="card-body">
{!!$equiposbaja->Links()!!}
</div>
</body>
</html>
@endsection






