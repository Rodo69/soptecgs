@extends('layouts.appinventario')

@section('title', 'Alta Servidor')

@section('content')
@if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<body>
    <div class="container">
        <aside>
            <h2 class="text-xl font-semibold tracking-tight">Alta Servidor</h2>
            <p class="mt-1 text-gray-500">Todos los campos son obligatorios *</p>
        </aside>
        <form  class="row g-3"
             action="{{route('servidores.store')}}" method="POST" enctype="multipart/form-data">

            @csrf 
            <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Servidor</label>
            <input class="form-control" id="inputEmail4"
                id="nombre" type="text" name="nombre" value="{{old('nombre')}}">
                @error('nombre')
                <br>
                <small class="text-danger">*{{$message}}</small>
                <br>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="inputState" class="form-label">Sucursal Asignada</label>
                <select name="sucursalasig"  id="inputState" class="form-select">
                    <option selected>Selecciona la sucursal </option>
                    @foreach ($sucursales as $sucursal)
                            <option value="{{$sucursal->id}}">{{$sucursal->nombre}}</option>
                        @endforeach
                </select>
                @error('sucursalasig')
                <br>
                <small class="text-danger">*{{$message}}</small>
                <br>
                @enderror
                </div>

                <div class="col-md-6">
                    <label for="ip" class="form-label">IP</label>
                    <input type="number" id="ip" name="ip" class="form-control" >{{old('ip')}}
                    @error('ip')
                    <br>
                    <small class="text-danger">*{{$message}}</small>
                    <br>
                    @enderror  
                </div>
                  <div class="col-md-6">
                    <label for="mascara" class="form-label">Mascara</label>
                    <input class="form-control" id="mascara"
                    type="text" name="mascara" value="{{old('mascara')}}">
                    @error('mascara')
                    <br>
                    <small class="text-danger">*{{$message}}</small>
                    <br>
                    @enderror  
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">GATEWAY</label>
                    <input id="gateway" type="text" name="gateway" 
                    value="{{old('gateway')}}" class="form-control">
                    @error('gateway')
                    <br>
                    <small class="text-danger">*{{$message}}</small>
                    <br>
                    @enderror  
                </div>

                  <div class="col-md-6">
                    <label class="form-label">DNS</label>
                    <input  id="dns" type="NUMBER" name="dns" 
                    value="{{old('dns')}}" class="form-control" id="inputPassword4">
                    @error('dns')
                    <br>
                    <small class="text-danger">*{{$message}}</small>
                    <br>
                    @enderror  
                </div>

                <div class="col-md-6">
                    <label for="formFileMultiple" class="form-label">Imagen</label>
                    <input class="form-control"  type="file" name="imagen" accept="image/*" value="{{old('imagen')}}" multiple>
                    @error('imagen')
                    <br>
                    <small class="text-danger">*{{$message}}</small>
                    <br>
                    @enderror      
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">Status</label>
                    <input id="status"
                    type="text" name="status" value="{{old('status')}}"class="form-control" >
                    @error('status')
                    <br>
                    <small class="text-danger">*{{$message}}</small>
                    <br>
                    @enderror  
                </div>

            <footer class="flex items-center justify-end px-4 py-2 space-x-4">
                <button
                class="btn btn-success"
                    type="submit">Enviar</button>
                    
                    <a href="{{route('servidores.index')}}" class="btn btn-outline-secondary">Cancelar</a>
            </footer> 
        </form>
    </div>
</body>
@endsection