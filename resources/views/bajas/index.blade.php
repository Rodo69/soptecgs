<!DOCTYPE html>
<html lang="en">
<head>
    @extends('layouts.appinventario')
    @section('content')
    <div class="container">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>Obsoletos</title>
</head>

<body>
    <a href="{{url('bajas/create')}}" class="btn btn-warning">Agregar</a>
    <a href="{{url('bajas/pdf')}}" class="btn btn-dark">PDF <i class="bi bi-file-earmark-pdf"></i></a><br><br>

    <table class="table" style="text-align:center">
        <thead class="thead-dark">
            <tr>
            <th>-</th>
            <th>Evidencia</th>        
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
    
           <a href="{{route('bajas.show', $equipobaja->id)}}" class="btn btn-dark"><i class="bi bi-arrows-angle-expand"></i></a>
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