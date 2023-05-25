<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- <h1>{{ $modo }} Equipos</h1> --}}
@if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-group"  style="display: inline-flex;">
    <label for="Nombre" style="margin-right:20px">Tipo</label>
    <input type="text" class="form-control" name="tipo"
        value="{{ isset($equipo->tipo) ? $equipo->tipo : old('tipo') }}" id="tipo" style="width: 30%;  margin-right:50px;">
        <label for="Nombre">Marca</label>
    <input type="text" class="form-control" name="marca"
        value="{{ isset($equipo->marca) ? $equipo->marca : old('marca') }}" id="marca" style="width: 30%; ">
</div>
{{-- <div class="form-group" >
    <label for="Nombre">Marca</label>
    <input type="text" class="form-control" name="marca"
        value="{{ isset($equipo->marca) ? $equipo->marca : old('marca') }}" id="marca" style="width: 30%; background-color:black; display:inline-flex;">
</div> --}}
<div class="form-group">
    <label for="Nombre">Modelo</label>
    <input type="text" class="form-control" name="modelo"
        value="{{ isset($equipo->modelo) ? $equipo->modelo : old('modelo') }}" id="modelo">
</div>
<div class="form-group"> 
    <label for="Nombre">Serie</label>
    <input type="text" class="form-control" name="serie"
        value="{{ isset($equipo->serie) ? $equipo->serie : old('serie') }}" id="serie">
</div>
<div class="form-group">
    <label for="Nombre">Placa</label>
    <input type="text" class="form-control" name="placa"
        value="{{ isset($equipo->placa) ? $equipo->placa : old('placa') }}" id="placa">
</div>
<div class="form-group">
    <label for="Nombre">Empleado</label>
    <select name="empleado_asig" id="empleado_asig" class="form-control">
        @foreach ($empleados as $empleado)
        <option id="empleado_asig" value="{{ $empleado->id}}">{{$empleado->nombre_colaborador}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="Nombre">Sucursal</label>
    <select name="sucursal_asig" id="sucursal_asig" class="form-control">
        @foreach ($sucursales as $sucursal)
        <option id="sucursal_asig" value="{{ $sucursal->id}}">{{$sucursal->nombre}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="Nombre">Unidad</label>
    <select name="unidad_asig" id="unidad_asig" class="form-control">
        @foreach ($categorias as $categoria)
        <option id="unidad_asig" value="{{ $categoria->id}}">{{$categoria->nombre}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="Nombre">Equipo</label>
    <input type="text" class="form-control" name="nombre_equipo"
        value="{{ isset($equipo->nombre_equipo) ? $equipo->nombre_equipo : old('nombre_equipo') }}" id="nombre_equipo">
</div>
<input class="btn btn-success" type="submit" Value="{{ $modo }} datos" >
<a class="btn btn-primary" href="{{ url('equipos/') }}">Cancelar</a>
</div>
</body>
</html>

