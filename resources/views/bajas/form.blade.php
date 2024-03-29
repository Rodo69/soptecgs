
<h2 class="text-center">{{ $modo }} Equipo Obsoleto</h2>
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
    <label for="tipo">Tipo</label>
    <input type="text" class="form-control" name="tipo"
        value="{{ isset($equipo->tipo) ? $equipo->tipo : old('tipo') }}" id="tipo">
    <br>
</div>

<div class="form-group">
    <label for="modelo">Modelo</label>
    <input type="text" class="form-control" name="modelo"
        value="{{ isset($equipo->modelo) ? $equipo->modelo : old('modelo') }}" id="modelo">
    <br>
</div>

<div class="form-group">
    <label for="marca">Marca</label>
    <input type="text" class="form-control" name="marca"
        value="{{ isset($equipo->marca) ? $equipo->marca : old('marca') }}" id="marca">
    <br>
</div>

<div class="form-group">
    <label for="placa">Placa</label>
    <input type="text" class="form-control" name="placa"
        value="{{ isset($equipo->placa) ? $equipo->placa : old('placa') }}"
        id="placa">
    <br>
</div>

<div class="form-group">
    <label for="serie">Serie</label>
    <input type="text" class="form-control" name="serie"
        value="{{ isset($equipo->serie) ? $equipo->serie : old('serie') }}"
        id="serie">
    <br>
</div>

<div class="form-group">
    <label for="fecha_registro">Fecha de Registro</label>
    <input type="date" class="form-control" name="fecha_registro"
    value="{{ isset($equipo->fecha_registro) ? $equipo->fecha_registro : old('fecha_registro') }}"
    id="fecha_registro">
</div>

<div class="form-group">
    <label for="descripción">Descripción </label>
    <input type="text" class="form-control" name="descripcion"
        value="{{ isset($equipo->descripcion) ? $equipo->descripcion : old('descripcion') }}"
        id="descripcion">
    <br>
</div>

<div class="form-group">
    <label for="Nombre">Evidencia</label>
    @if (isset($equipo->foto_obsoleto))
        <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $equipo->foto_obsoleto }}" width="100"
            alt="" srcset="">
    @endif
    <input type="file" class="form-control" Name="foto_obsoleto" value="{" id="foto_obsoleto">
    <br>
</div>

<input class="btn btn-success" type="submit" Value="{{ $modo }} ">

<a class="btn btn-danger" href="{{ url('/bajas') }}">Cancelar</a>

</div>



