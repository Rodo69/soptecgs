@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Equipo</h1>
@stop

@section('content')

<div class="container">
    <form action="{{ url('/equipos/' . $equipo->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        @include('equipos.form', ['modo' => 'Editar']);
    </form>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop