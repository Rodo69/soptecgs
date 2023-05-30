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
                  'El mantenimiento se elimino con éxito',
                  'success'
                )
    </script>
@endif

  
    <h3 class="text-center">Mantenimientos</h3>

    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{url('checklist/create')}}" class="btn btn-warning">Agregar</a>
            </div>
        </div>
<br>

<table class="table table-striped table-sm text-center">
    <thead class="thead-dark">
            <tr>
            <th>Fachada</th>
            <th>Nombre</th>        
            <th>Fecha de mantenimiento</th>  
            
            <th>Acciones</th>   
        </tr>
    </thead>

    <tbody>
        @foreach($cheklist as $checklistt)
        <tr>
          
            <td>  
                <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$checklistt->foto_fachada}}" width="120" alt="" srcset="">  
            </td>
            <td>{{$checklistt->nombre}}</td>
            <td>{{$checklistt->fecha_registro}}</td>
           
            <td>  
                <a href="{{url('/checklist/'.$checklistt->id.'/edit')}}" class="btn btn-dark">
                    <i class="bi bi-pencil-fill"></i> 
                </a>
                
            <form action="{{url('/checklist/'.$checklistt->id)}}" class="d-inline  formulario-eliminar" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-trash"></i> 
                </button>
            </form>
        </td>
        </tr>
        <script>

            $('.formulario-eliminar').submit(function(e){
                e.preventDefault();

              Swal.fire({
              title: '¿Estas seguro?',
              text: "Este mantenimiento se eliminará definitivamente",
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
{!!$cheklist->Links()!!}
</div>
</body>
</html>
@endsection

