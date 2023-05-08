@extends('layouts.appinventario')

@section('content')
<title>Agenda</title>
{{-- <link rel="shortcut icon" href="imagenes/gs.png" type="image/x-icon"> --}}
<div class="container">
    <div id='agenda'></div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#evento">
  Launch
</button>

<!-- Modal -->
<div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                <form action="">
                    {!! csrf_field() !!}

                    <div class="form-group">
                      <label for="title">Titulo</label>
                      <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Escribe el titulo de la actividad">
                      <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>

                    <div class="form-group">
                      <label for="color">Color</label>
                      <textarea class="form-control" name="color" id="color" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="star">start</label>
                      <input type="text" class="form-control" name="star" id="star" aria-describedby="helpId" placeholder="">
                      <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>

                    <div class="form-group">
                      <label for="end">end</label>
                      <input type="text" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">
                      <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
            </div>
        </div>
    </div>
</div>
@endsection