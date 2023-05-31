<h1 class="text-center">{{ $modo }} Mantenimiento</h1>
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
    <select name="sucursal_name" id="sucursal_name" class="form-select">
        <option selected>Selecciona la sucursal </option>
        @foreach ($sucursales as $sucursal)
        <option value="{{ $sucursal->id}}">{{$sucursal->nombre }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="fecha">Fecha registro </label>
    <input type="date" class="form-control" name="fecha_registro"
        value="{{ isset($checklistedit->fecha_registro) ? $checklistedit->fecha_registro : old('fecha_registro') }}"
        id="fecha_registro">
    <br>
</div>

<div class="form-group">
    <label for="foto_fachada">Foto Fachada</label>
    @if (isset($checklistedit->foto_fachada))
        <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $checklistedit->foto_fachada }}" width="100"
            alt="" srcset="">
    @endif
    <input type="file" class="form-control" Name="foto_fachada" value="{" id="foto_fachada">
    <br>
</div>

<input class="btn btn-success" type="submit" Value="{{ $modo }} ">
<a class="btn btn-primary" href="{{ url('checklist/') }}">Cancelar</a>
</div>
