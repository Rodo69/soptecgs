@extends('layouts.appinventario')

@section('content')
<title>Agenda</title>
{{-- <link rel="shortcut icon" href="imagenes/gs.png" type="image/x-icon"> --}}
<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col-8" id='agenda'></div> 
        <div class="col"></div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="actividad" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nueva Actividad </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                {{-- FORMULARIO DE MODAL --}}
                <form action="" id="form" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="title">Titulo</label>
                      <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Escribe el titulo de la actividad">
                    </div>

                    {{-- <label class="inline-block text-sm font-medium text-gray-700"
                        for=""> Sucursal asignada </label>

<br>
                        <select name="patio" id="">
                            <option value="">patio</option>
                        </select> --}}

                        {{-- <select name="sucursalasig"  class="block w-full h-10 transition duration-75 border-gray-300 rounded-lg shadow-sm focus:ring-1 focus:ring-inset focus:ring-blue-600 focus:border-blue-600">
                            @foreach ($sucursales as $sucursal)
                            <option value="{{old('id',$sucursal->id )}}" @selected(old('nombre', $sucursal->nombre) == $sucursal)> {{$sucursal->nombre}} </option>

                                //// <option value="{{$sucursal->id}}">{{$sucursal->nombre}}1</option> 
                            @endforeach
                        </select> --}}

                    <div class="form-group">
                        <label for="color">Color</label>
                        <input type="color" class="form-control" name="color" id="color" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group">
                      <label for="start">start</label>
                      <input type="date" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group">
                      <label for="end">end</label>
                      <input type="date" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
                <button type="button" class="btn btn-warning" id="btnEditar">Editar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnCancelar">Cancelar</button>
                <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
            </div>
        </div>
    </div>
</div>
@endsection