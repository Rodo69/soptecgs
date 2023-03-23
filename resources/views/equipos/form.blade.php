<h1>{{ $modo }} Equipos</h1>


<div class="form-group">
    <label for="Nombre">Tipo</label>
    <input type="text" class="form-control" name="tipo"
        value="{{ isset($equipo->tipo) ? $equipo->tipo : old('tipo') }}" id="tipo">
    <br>
</div>
<div class="form-group">
    <label for="Nombre">Marca</label>
    <input type="text" class="form-control" name="marca"
        value="{{ isset($equipo->marca) ? $equipo->marca : old('ApellidoPaterno') }}"
        id="marca">
    <br>
</div>
<div class="form-group">
    <label for="Nombre">Modelo</label>
    <input type="text" class="form-control" name="modelo"
        value="{{ isset($equipo->modelo) ? $equipo->modelo : old('ApellidoMaterno') }}"
        id="modelo">
    <br>
</div>
<div class="form-group">
    <label for="Nombre">Serie</label>
    <input type="text" class="form-control" name="serie"
        value="{{ isset($equipo->serie) ? $equipo->serie : old('serie') }}" id="serie">
    <br>
</div>
<div class="form-group">
    <label for="Nombre">Placa</label>
    <input type="text" class="form-control" name="placa"
        value="{{ isset($equipo->placa) ? $equipo->placa : old('placa') }}" id="placa">
    <br>
</div>
<div class="form-group">
    <label for="Nombre">Empleado</label>
    <input type="text" class="form-control" name="empleado_asig"
        value="{{ isset($equipo->empleado_asig) ? $equipo->empleado_asig : old('empleado_asig') }}" id="empleado_asig">
    <br>
</div>
<div class="form-group">
    <label for="Nombre">Sucursal</label>
    <input type="text" class="form-control" name="sucursal_asig"
        value="{{ isset($equipo->sucursal_asig) ? $equipo->sucursal_asig : old('sucursal_asig') }}" id="empleado_asig">
    <br>
</div>
<div class="form-group">
    <label for="Nombre">Unidad</label>
    <input type="text" class="form-control" name="unidad_asig"
        value="{{ isset($equipo->unidad_asig) ? $equipo->unidad_asig : old('unidad_asig') }}" id="empleado_asig">
    <br>
</div>
<div class="form-group">
    <label for="Nombre">Equipo</label>
    <input type="text" class="form-control" name="nombre_equipo"
        value="{{ isset($equipo->nombre_equipo) ? $equipo->nombre_equipo : old('nombre_equipo') }}" id="nombre_equipo">
    <br>
</div>

<div class="form-group">
    <label for="Nombre">Foto</label>
    @if (isset($equipo->foto_equipo))
        <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $equipo->foto_equipo }}" width="100"
            alt="" srcset="">
    @endif
    <input type="file" class="form-control" Name="foto_equipo" value="{" id="foto_equipo">
    <br>
</div>
<input class="btn btn-success" type="submit" Value="{{ $modo }} datos">
<a class="btn btn-primary" href="{{ url('equipos/') }}">Cancelar</a>
</div>
