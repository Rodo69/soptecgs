
@extends('layouts.appinventario')
@section('content')
<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
</head>
    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{Session::get('mensaje')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>  
    </div>
    @endif
  
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{url('bajas/create')}}" class="btn btn-warning">Agregar</a>
             
            </div>
            <div class="col">
                <form action="{{ route('bajas.index') }}" method="get" class="form-inline justify-content-end">
                    <div class="input-group">
                        <input type="text" name="busqueda" class="form-control mr-2" placeholder="Buscar placa o serie...">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">Buscar</button>
                            <a href="{{ route('bajas.index') }}" class="btn btn-secondary ml-2">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
<br>
    <table class="table" style="text-align:center">
        <thead class="thead-dark">
            <tr>
            <th>Foto fachada</th>
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
                <a href="{{url('/checklist/'.$checklistt->id.'/edit')}}" class="btn btn-primary">
                    <i class="bi bi-pencil-fill"></i> 
                </a>
                
            <form action="{{url('/checklist/'.$checklistt->id)}}" class="d-inline" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button type="submit" class="btn btn-danger" onClick="return confirm('¿Quieres borrar?')">
                    <i class="bi bi-trash"></i> 
                </button>
              
            </form>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!!$cheklist->Links()!!}
</div>
</body>
</html>
@endsection

