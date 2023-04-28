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
    <a href="{{url('checklist/create')}}" class="btn btn-warning">Agregar Mantenimineto</a>
<br><br>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Sucursal</th>        
            <th>Num. Sucursal</th>
            <th>Gerente de tienda</th>
            <th>Foto fachada</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cheklist as $checklistt)
        <tr>
            <td>{{$checklistt->id}}</td>
            <td>{{$checklistt->sucursal}}</td>
            <td>{{$checklistt->numero_sucursal}}</td>
            <td>{{$checklistt->gerente_tienda}}</td>
         
            <td>
                <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$checklistt->foto_fachada}}" width="120" alt="" srcset="">
            </td>
            <td>
                
            <a href="{{url('/checklist/'.$checklistt->id.'/edit')}}" class="btn btn-warning">Editar</a>    | 
           
            <form action="{{url('/checklist/'.$checklistt->id)}}" class="d-inline" method="post">
            @csrf    
            {{method_field('DELETE')}}
            <input type="submit" class="btn btn-danger" onClick="return confirm('¿Quieres borrar?')" value="Borrar">
           
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{!!$cheklist->Links()!!}

</div>

@endsection
</body>
</html>