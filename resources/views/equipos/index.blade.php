@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Equipos</h1>
@stop

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
   
    
   
        @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('mensaje') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="container">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>EQUIPOS</title>
    </head>

    <body>
        <a href="{{ url('equipos/create') }}" class="btn btn-warning" target="_blank">Registrar Nuevo Equipo</a>
        <a href="{{ url('equipo/pdf') }}" class="btn btn-warning" target="_blank">GenerarPDF</a>
        <br><br>
        <table id="articulos" class="table table-striped" style="width:100%">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Tipo</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Serie</th>
                    <th>Placa</th>
                    <th>Empleado</th>
                    <th>Sucursal</th>
                    <th>Unidad</th>
                    <th>Equipo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipos as $equipo)
                    <tr>
                        <td>{{ $equipo->id }}</td>
                        <td>{{ $equipo->tipo }}</td>
                        <td>{{ $equipo->marca }}</td>
                        <td>{{ $equipo->modelo }}</td>
                        <td>{{ $equipo->serie }}</td>
                        <td>{{ $equipo->placa }}</td>
                        <td>{{ $equipo->empleados->nombre_colaborador }}</td>
                        <td>{{ $equipo->sucursales->nombre }}</td>
                        <td>{{ $equipo->categoria->nombre }}</td>
                        <td>{{ $equipo->nombre_equipo }}</td>
                        <td>
                            <a href="{{ url('/equipos/' . $equipo->id . '/edit') }}" class="btn btn-warning">Editar</a>|
                            {{-- <a href="{{url('/equipo/'.$equipo->id)}}" class="btn btn-warning">PDF B</a>    |   --}}
                            <a href="{{ url('/equipo/' . $equipo->id) }}" class="btn btn-warning" target="_blank">Reporte</a>|
                            <form action="{{ url('/equipos/' . $equipo->id) }}" class="d-inline" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" class="btn btn-danger" onClick="return confirm('¿Quieres borrar?')" value="Retirar">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        {{-- {!!$equipos->Links()!!} --}}
        </div>

    </body>
    

    
    
    

{{-- @yield('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> --}}



</html>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#articulos').DataTable({
            "lengthMenu": [
                [5, 10, 50, -1],
                [5, 10, 50, "All"]
            ]
        });
    });
</script>
@stop