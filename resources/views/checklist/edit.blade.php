@extends('layouts.appinventario')
@section('content')
<div class="container">
    <form action="{{ url('/checklist/' . $checklistedit->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        @include('checklist.form', ['modo' => 'Editar'])
    </form>
</div>
@endsection