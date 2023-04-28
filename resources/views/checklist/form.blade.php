<h1>{{ $modo }} Mantenimiento</h1>
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
    <label for="Numerosucursal">Nombre Sucursal</label>
    <input type="text" class="form-control" name="sucursal_name"
        value="{{ isset($checklistedit->sucursal_name) ? $checklistedit->sucursal_name : old('sucursal_name') }}"
        id="numero_sucursal">
    <br>
</div>

<div class="form-group">
    <label for="Numerosucursal">Num. Sucursal</label>
    <input type="text" class="form-control" name="numero_sucursal"
        value="{{ isset($checklistedit->numero_sucursal) ? $checklistedit->numero_sucursal : old('numero_sucursal') }}"
        id="numero_sucursal">
    <br>
</div>

<div class="form-group">
    <label for="Nombre">Gerente Tienda</label>
    <input type="text" class="form-control" name="gerente_tienda"
        value="{{ isset($checklistedit->gerente_tienda) ? $checklistedit->gerente_tienda : old('gerente_tienda') }}"
        id="gerente_tienda">
    <br>
</div>

<div class="form-group">
    <label for="Nombre">Foto Fachada</label>
    @if (isset($checklistedit->foto_fachada))
        <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $checklistedit->foto_fachada }}" width="100"
            alt="" srcset="">
    @endif
    <input type="file" class="form-control" Name="foto_fachada" value="{" id="foto_fachada">
    <br>
</div>



<input class="btn btn-success" type="submit" Value="{{ $modo }} datos">
<a class="btn btn-primary" href="{{ url('checklist/') }}">Cancelar</a>
</div>
