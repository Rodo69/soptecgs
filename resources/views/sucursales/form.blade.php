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
    <label for="Nombre">Nombre</label>
    <input type="text" class="form-control" name="nombre"
        value="{{ isset($sucursal->nombre) ? $sucursal->nombre : old('nombre') }}" id="nombre">
    <br>
</div>
<div class="form-group">
    <label for="Nombre">Direccion</label>
    <input type="text" class="form-control" name="direccion"
        value="{{ isset($sucursal->direccion) ? $sucursal->direccion : old('direccion') }}"
        id="direccion">
    <br>
</div>
<div class="form-group">
    <label for="Nombre">Ingeniero</label>
    <input type="text" class="form-control" name="ingeniero_zona"
        value="{{ isset($sucursal->ingeniero_zona) ? $sucursal->ingeniero_zona : old('ingeniero_zona') }}"
        id="ingeniero_zona">
    <br>
</div>
<div class="form-group">
    <label for="Nombre">Telefono</label>
    <input type="text" class="form-control" name="telefono_ing"
        value="{{ isset($sucursal->telefono_ing) ? $sucursal->telefono_ing : old('telefono_ing') }}" id="telefono_ing">
    <br>
</div>
<div class="form-group">
    <label for="Nombre">Gerente</label>
    <input type="text" class="form-control" name="gerente_tienda"
        value="{{ isset($sucursal->gerente_tienda) ? $sucursal->gerente_tienda : old('gerente_tienda') }}" id="gerente_tienda">
    <br>
</div>
<div class="form-group">
    <label for="Nombre">Telefono</label>
    <input type="text" class="form-control" name="telefono_gerente"
        value="{{ isset($sucursal->telefono_gerente) ? $sucursal->telefono_gerente : old('telefono_gerente') }}" id="telefono_gerente">
    <br>
</div>
<div class="form-group">
    <label for="Nombre">Foto</label>
    @if (isset($sucursal->imagen))
        <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $sucursal->imagen }}" width="100"
            alt="" srcset="">
    @endif
    <input type="file" class="form-control" Name="imagen" value="{" id="imagen">
    <br>
</div>
<div class="form-group">
    <label for="Nombre">Unidad Negocio</label>
    <input type="text" class="form-control" name="banco_azteca"
        value="{{ isset($sucursal->banco_azteca) ? $sucursal->banco_azteca : old('banco_azteca') }}" id="banco_azteca">
    <br>
</div>
<div class="form-group">
    <label for="Nombre">Unidad Negocio</label>
    <input type="text" class="form-control" name="presta_prenda"
        value="{{ isset($sucursal->presta_prenda) ? $sucursal->presta_prenda : old('presta_prenda') }}" id="presta_prenda">
    <br>
</div>
<div class="form-group">
    <label for="Nombre">Unidad Negocio</label>
    <input type="text" class="form-control" name="comercio"
        value="{{ isset($sucursal->comercio) ? $sucursal->comercio : old('comercio') }}" id="comercio">
    <br>
</div>


<input class="btn btn-success" type="submit" Value="{{ $modo }} datos">
<a class="btn btn-primary" href="{{ url('sucursales/') }}">Cancelar</a>
</div>
