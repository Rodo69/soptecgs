@extends('layouts.fondo')

@section('title', 'Alta Servidor')

@section('micontent')

<body>
    <div class="grid md:grid-cols-[2fr,3fr] gap-6 md:gap-12 mt-6">
        <aside>
            <h2 class="text-xl font-semibold tracking-tight">Ingresa los datos que se te piden</h2>

            <p class="mt-1 text-gray-500">Todos los campos son obligatorios *</p>
        </aside>
    

        <form 
             action="{{route('servidores.store')}}" method="POST" enctype="multipart/form-data">

            @csrf 

            <div class="grid grid-cols-2 gap-6 px-4 py-4">
                <div class="col-span-2 space-y-2 md:col-span-1">
                    <label class="inline-block text-sm font-medium text-gray-700"
                        for="">Servidor</label>
                        

                    <input
                        class="block w-full h-10 transition duration-75 border-gray-300 rounded-lg shadow-sm focus:ring-1 focus:ring-inset focus:ring-blue-600 focus:border-blue-600"
                        id="nombre"
                        type="text" name="nombre" value="{{old('nombre')}}">

                        @error('nombre')
                        <br>
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                </div>

                <div class="col-span-2 space-y-2 md:col-span-1">
                    <label class="inline-block text-sm font-medium text-gray-700"
                        for=""> Sucursal asignada </label>

                        <select name="sucursalasig" class="block w-full h-10 transition duration-75 border-gray-300 rounded-lg shadow-sm focus:ring-1 focus:ring-inset focus:ring-blue-600 focus:border-blue-600">
                            <option value="">selecciona la sucursal </option>
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

                <div class="col-span-2 space-y-2 md:col-span-1">
                    <label class="inline-block text-sm font-medium text-gray-700"
                        for="ing_zona"> IP </label>

                    <input
                        class="block w-full transition duration-75 border-gray-300 rounded-lg shadow-sm focus:border-blue-600 focus:ring-1 focus:ring-inset focus:ring-blue-600"
                        id="ip" name="ip">{{old('ip')}}
                        @error('ip')
                        <br>
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                </div>

                 <div class="col-span-2 space-y-2 md:col-span-1">
                    <label class="inline-block text-sm font-medium text-gray-700"
                        for="mascara"> Mascara </label>

                    <input
                        class="block w-full h-10 transition duration-75 border-gray-300 rounded-lg shadow-sm focus:ring-1 focus:ring-inset focus:ring-blue-600 focus:border-blue-600"
                        id="mascara"
                        type="text" name="mascara" value="{{old('mascara')}}">
                        @error('mascara')
                        <br>
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                </div>

                <div class="col-span-2 space-y-2 md:col-span-1">
                    <label class="inline-block text-sm font-medium text-gray-700"
                        for="">GATEWAY</label>

                    <input
                        class="block w-full h-10 transition duration-75 border-gray-300 rounded-lg shadow-sm focus:ring-1 focus:ring-inset focus:ring-blue-600 focus:border-blue-600"
                        id="gateway"
                        type="text" name="gateway" value="{{old('gateway')}}">
                        @error('gateway')
                        <br>
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                    </div>

                <div class="col-span-2 space-y-2 md:col-span-1">
                    <label class="inline-block text-sm font-medium text-gray-700"
                        for="">DNS</label>

                    <input
                        class="block w-full h-10 transition duration-75 border-gray-300 rounded-lg shadow-sm focus:ring-1 focus:ring-inset focus:ring-blue-600 focus:border-blue-600"
                        id="dns"
                        type="text" name="dns" value="{{old('dns')}}">
                        
                        @error('dns')
                        <br>
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                </div>

                <div class="col-span-2 space-y-2 md:col-span-1">
                    <label class="inline-block text-sm font-medium text-gray-700"
                        for="">Imagen</label>

                    <input
                        class="block w-full h-10 transition duration-75 border-gray-300 rounded-lg shadow-sm focus:ring-1 focus:ring-inset focus:ring-blue-600 focus:border-blue-600"
                        type="file" name="imagen" accept="image/*" value="{{old('imagen')}}">
               
                        @error('imagen')
                        <br>
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror                    
                    </div>

                <div class="col-span-2 space-y-2 md:col-span-1">
                    <label class="inline-block text-sm font-medium text-gray-700"
                        for="">status</label>

                    <input
                        class="block w-full h-10 transition duration-75 border-gray-300 rounded-lg shadow-sm focus:ring-1 focus:ring-inset focus:ring-blue-600 focus:border-blue-600"
                        id="status"
                        type="text" name="status" value="{{old('status')}}">

                        @error('status')
                        <br>
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
            </div>

            <footer class="flex items-center justify-end px-4 py-2 space-x-4">
                <button
                    class="inline-flex items-center justify-center h-8 px-3 text-sm font-semibold tracking-tight text-white transition bg-blue-600 rounded-lg shadow hover:bg-blue-500 focus:bg-blue-700 focus:outline-none focus:ring-offset-2 focus:ring-offset-blue-700 focus:ring-2 focus:ring-white focus:ring-inset"
                    type="submit">Enviar</button>
                    
                    <a href="{{route('servidores.index')}}" class="btn btn-outline-secondary">Cancelar</a>
            </footer> 
        </form>
    </div>
</body>
@endsection