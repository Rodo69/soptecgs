@extends('layouts.appinventario')
@section('content')
<div class="container">
    <form action="{{ url('/sucursales/' . $sucursal->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        @include('sucursales.form', ['modo' => 'Editar']);
    </form>
</div>
@endsection
