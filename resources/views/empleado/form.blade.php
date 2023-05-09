<h1>{{$modo}} Empleado</h1>
@if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-group">
    <label for="Nombre">Nombre</label>
    <input type="text" class="form-control" name="nombre_colaborador"
        value="{{ isset($empleado->nombre_colaborador) ? $empleado->nombre_colaborador : old('nombre_colaborador') }}"
        id="nombre_colaborador">
    <br>
</div>
<div class="form-group">
    <label for="Nombre">Apellido Paterno</label>
    <input type="text" class="form-control" name="apellido_p"
        value="{{ isset($empleado->apellido_p) ? $empleado->apellido_p : old('apellido_p') }}" id="apellido_p">
    <br>
</div>
<div class="form-group">
    <label for="Nombre">Apellido Materno</label>
    <input type="text" class="form-control" name="apellido_m"
        value="{{ isset($empleado->apellido_m) ? $empleado->apellido_m : old('apellido_m') }}" id="apellido_m">
    <br>
</div>
<div class="form-group">
    <label for="Nombre">Telefono</label>
    <input type="text" class="form-control" name="telefono"
        value="{{ isset($empleado->telefono) ? $empleado->telefono : old('telefono') }}" id="telefono">
    <br>
</div>
<div class="form-group">
    <label for="Nombre">Numero Colaborador</label>
    <input type="text" class="form-control" name="numero_colaborador"
        value="{{ isset($empleado->numero_colaborador) ? $empleado->numero_colaborador : old('numero_colaborador') }}"
        id="numero_colaborador">
    <br>
    <div class="form-group">
        <label for="Nombre">Sucursal Asignada</label>
        <select name="sucursal_asignada" id="sucursal_asignada" class="form-control">
            @foreach ($sucursales as $sucursal)
            <option id="sucursal_asignada" value="{{ $sucursal->id}}">{{$sucursal->nombre}}</option>
            @endforeach
        </select>
        <br>
        <div class="form-group">
            <label for="Nombre">Unidad Asignada</label>
            <select name="unidad_asignada" id="unidad_asignada" class="form-control">
                @foreach ($categorias as $categoria)
                <option id="unidad_asignada" value="{{ $categoria->id}}">{{$categoria->nombre}}</option>
                @endforeach
            </select>
            <br>
            <div class="form-group">
                <label for="Nombre">Puesto</label>
                <input type="text" class="form-control" name="puesto"
                    value="{{ isset($empleado->puesto) ? $empleado->puesto : old('puesto') }}" id="puesto">
                <br>
                <input class="btn btn-success" type="submit" Value="{{ $modo }} datos">
                <a class="btn btn-primary" href="{{ url('empleado/') }}">Cancelar</a>
            </div>
