<h1>{{ $modo }} Equipos</h1>
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
    <label for="Nombre">Tipo</label>
    <input type="text" class="form-control" name="tipo"
        value="{{ isset($equipo->tipo) ? $equipo->tipo : old('tipo') }}" id="tipo">
    <br>
</div>
<div class="form-group">
    <label for="Nombre">Placa</label>
    <input type="text" class="form-control" name="placa"
        value="{{ isset($equipo->placa) ? $equipo->placa : old('placa') }}"
        id="placa">
    <br>
</div>
<div class="form-group">
    <label for="Nombre">Serie</label>
    <input type="text" class="form-control" name="serie"
        value="{{ isset($equipo->serie) ? $equipo->serie : old('serie') }}"
        id="serie">
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

<div class="form-group">
    <label for="Nombre">modelo</label>
    <input type="text" class="form-control" name="modelo"
        value="{{ isset($equipo->modelo) ? $equipo->modelo : old('modelo') }}" id="modelo">
    <br>
</div>

<div class="form-group">
    <label for="Nombre">Inge</label>
    <input type="text" class="form-control" name="ing_cargo"
        value="{{ isset($equipo->ing_cargo) ? $equipo->ing_cargo : old('ing_cargo') }}" id="ing_cargo">
    <br>
</div>


<input class="btn btn-success" type="submit" Value="{{ $modo }} datos">
<a class="btn btn-primary" href="{{ url('equipos/') }}">Cancelar</a>
</div>