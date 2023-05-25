@extends('layouts.appinventario')
@section('content')


<div class="container">
    <form action="{{ url('/bajas/' . $equipo->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        @include('bajas.form', ['modo' => 'Editar']);
    </form>
</div>


@endsection