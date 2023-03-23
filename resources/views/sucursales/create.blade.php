@extends('layouts.principal')

@section('title', 'Alta Sucursal')

@section('micontent')

<body>
    <div class="grid md:grid-cols-[2fr,3fr] gap-6 md:gap-12 mt-6">
        <aside>
            <h2 class="text-xl font-semibold tracking-tight">Ingresa los datos que se te piden</h2>

            <p class="mt-1 text-gray-500">Todos los campos son obligatorios *</p>
        </aside>

        <form 
             action="{{route('sucursales.store')}}" method="POST" enctype="multipart/form-data">

            @csrf 

            <div class="grid grid-cols-2 gap-6 px-4 py-4">
                <div class="col-span-2 space-y-2 md:col-span-1">
                    <label class="inline-block text-sm font-medium text-gray-700"
                        for="">Nombre</label>

                    <input
                        class="block w-full h-10 transition duration-75 border-gray-300 rounded-lg shadow-sm focus:ring-1 focus:ring-inset focus:ring-blue-600 focus:border-blue-600"
                        id="nombre"
                        type="text" name="nombre" value="{{old('nombre')}}">

                        @error('nombre')
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                </div>

                <div class="col-span-2 space-y-2 md:col-span-1">
                    <label class="inline-block text-sm font-medium text-gray-700"
                        for=""> Dirección </label>

                    <input
                        class="block w-full h-10 transition duration-75 border-gray-300 rounded-lg shadow-sm focus:ring-1 focus:ring-inset focus:ring-blue-600 focus:border-blue-600"
                        id="direccion"
                        type="text" name="direccion" value="{{old('direccion')}}">

                        @error('direccion')
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                </div>

                <div class="col-span-2 space-y-2 md:col-span-1">
                    <label class="inline-block text-sm font-medium text-gray-700"
                        for="ing_zona">Ingeniero de Zona</label>

                    <textarea
                        class="block w-full transition duration-75 border-gray-300 rounded-lg shadow-sm focus:border-blue-600 focus:ring-1 focus:ring-inset focus:ring-blue-600"
                        id="ingeniero_zona" name="ingeniero_zona">{{old('ingeniero_zona')}}</textarea>

                        @error('ingeniero_zona')
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                </div>

                 <div class="col-span-2 space-y-2 md:col-span-1">
                    <label class="inline-block text-sm font-medium text-gray-700"
                        for="telefono_ing">Telefono del Ingeniero </label>

                    <input
                        class="block w-full h-10 transition duration-75 border-gray-300 rounded-lg shadow-sm focus:ring-1 focus:ring-inset focus:ring-blue-600 focus:border-blue-600"
                        id="telefono_ing"
                        type="text" name="telefono_ing" value="{{old('telefono_ing')}}">

                        @error('telefono_ing')
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                </div>

                <div class="col-span-2 space-y-2 md:col-span-1">
                    <label class="inline-block text-sm font-medium text-gray-700"
                        for="">Gerente de la tienda</label>

                    <input
                        class="block w-full h-10 transition duration-75 border-gray-300 rounded-lg shadow-sm focus:ring-1 focus:ring-inset focus:ring-blue-600 focus:border-blue-600"
                        id="gerente_tienda"
                        type="text" name="gerente_tienda" value="{{old('gerente_tienda')}}">
                        
                        @error('gerente_tienda')
                        <small class="text-danger">*{{$message}}</small>
                        <br>
                        @enderror
                </div>
            </div>

            <footer class="flex items-center justify-end px-4 py-2 space-x-4">
                <button
                    class="inline-flex items-center justify-center h-8 px-3 text-sm font-semibold tracking-tight text-white transition bg-blue-600 rounded-lg shadow hover:bg-blue-500 focus:bg-blue-700 focus:outline-none focus:ring-offset-2 focus:ring-offset-blue-700 focus:ring-2 focus:ring-white focus:ring-inset"
                    type="submit">Enviar</button>
                    
                    <a href="{{route('sucursales.index')}}" class="btn btn-outline-secondary">Cancelar</a>
            </footer> 
        </form>
        @endsection
    </div>

</body>