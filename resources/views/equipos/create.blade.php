@extends('layouts.appinventario')
@section('content')
<div class="container">
    <form action="{{url('/equipos')}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('equipos.form',['modo'=>'Crear']);
    </form>
</div>
@endsection