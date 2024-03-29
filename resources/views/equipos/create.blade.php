@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Registrar Equipo</h1>
@stop

@section('content')

<div class="container">
    <form action="{{url('/equipos')}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('equipos.form',['modo'=>'Crear']);
    </form>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    
@stop