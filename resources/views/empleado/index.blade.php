@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Empleados</h1>
@stop

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>

    @section('css')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    @endsection

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
        <title>EMPLEADOS</title>
</head>

<body>
    <a href="{{ url('empleado/create') }}" class="btn btn-warning">Registrar Nuevo Empleado</a>
    <a href="{{ url('empleados/pdf') }}" class="btn btn-warning">GenerarPDF</a>
    <br><br>
    <table id="articulos" class="table table-striped" style="width:100%">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Telefono</th>
                <th>N Colaborador</th>
                <th>Sucursal</th>
                <th>Unidad</th>
                <th>Puesto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->id }}</td>
                    <td>{{ $empleado->nombre_colaborador }}</td>
                    <td>{{ $empleado->apellido_p }}</td>
                    <td>{{ $empleado->apellido_m }}</td>
                    <td>{{ $empleado->telefono }}</td>
                    <td>{{ $empleado->numero_colaborador }}</td>
                    <td>{{ $empleado->sucursales->nombre }}</td>
                    <td>{{ $empleado->categoria->nombre }}</td>
                    <td>{{ $empleado->puesto }}</td>
                    <td>
                        <a href="{{ url('/empleado/' . $empleado->id . '/edit') }}" class="btn btn-warning">Editar</a>
                        |
                        <form action="{{ url('/empleado/' . $empleado->id) }}" class="d-inline" method="post">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input type="submit" class="btn btn-danger"
                                onClick="return confirm('¿Quieres borrar?')"value="Borrar">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {!! $empleados->Links() !!} --}}
    </div>

</body>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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
</script> --}}

</html>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
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
