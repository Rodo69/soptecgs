<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mostrar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    @extends('layouts.appinventario')
    @section('content')
</head>
<body> 
    <div style="padding-left: 40%; padding-top: 5%">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{asset('storage').'/'.$obsoleto->foto_obsoleto}}" alt="Foto del equipo">
            <div class="card-body">
                <h5 class="card-title text-center">TIPO: {{$obsoleto->tipo}}</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Modelo: {{$obsoleto->modelo}}</li>
                    <li class="list-group-item">Marca: {{$obsoleto->marca}}</li>
                    <li class="list-group-item">Placa: {{$obsoleto->placa}}</li>
                    <li class="list-group-item">Serie: {{$obsoleto->serie}}</li>
                    <li class="list-group-item">Descripción: {{$obsoleto->descripcion}}</li>
                </ul>
                <div class="text-center">
                    <a class="btn btn-danger mr-2" href="{{ url('/bajas') }}">Volver</a> 
                    <a href="{{url('/bajas/'.$obsoleto->id.'/edit')}}" class="btn btn-primary">Editar</a> 
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection