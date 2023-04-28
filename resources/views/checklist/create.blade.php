@extends('layouts.appinventario')
@section('content')
<div class="container">
    <form action="{{url('/checklist')}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('checklist.form',['modo'=>'Crear']);
    </form>
</div>
@endsection