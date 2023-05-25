@extends('layouts.appinventario')
@section('content')



<div class="container">
    <form action="{{url('/bajas')}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('bajas.form',['modo'=>'Crear']);
    </form>
</div>



@endsection