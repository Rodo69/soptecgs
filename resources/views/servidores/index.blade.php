@extends('layouts.principal')

@section('title', 'Servidor')

@section('micontent')

<a href="{{route('servidores.create')}}" class="btn btn-outline-primary">Registar un servidor</a>

<a href="home" class="btn btn-outline-primary">Regresar</a>



@endsection