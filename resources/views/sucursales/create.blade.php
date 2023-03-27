@extends('layouts.appinventario')
@section('content')
<div class="container">
    <form action="{{url('/sucursales')}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('sucursales.form',['modo'=>'Crear']);
    </form>
</div>
@endsection