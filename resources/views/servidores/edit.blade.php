@extends('layouts.fondo')

@section('title', 'Modificar')

@section('micontent')

<body>
    <div class="grid md:grid-cols-[2fr,3fr] gap-6 md:gap-12 mt-6">
        <aside>
            <h2 class="mt-1 text-2xl font-semibold tracking-tight">Actualizar datos</h2>

            <p class="mt-1 text-gray-500">Todos los campos son obligatorios *</p>
        </aside>
    

        <form 
             action="{{route('servidores.update', $servidor->id)}}" method="post" enctype="multipart/form-data">

             @csrf {{-- directiva --}}

             @method('put')

            <div class="grid grid-cols-2 gap-6 px-4 py-4">
                <div class="col-span-2 space-y-2 md:col-span-1">
                    <label class="inline-block text-sm font-medium text-gray-700"
                        for="">Servidor</label>

                    <input
                        class="block w-full h-10 transition duration-75 border-gray-300 rounded-lg shadow-sm focus:ring-1 focus:ring-inset focus:ring-blue-600 focus:border-blue-600"
                        id="nombre"
                        type="text" name="nombre" value="{{old('nombre', $servidor->nombre)}}">

                </div>

                <div class="col-span-2 space-y-2 md:col-span-1">
                    <label class="inline-block text-sm font-medium text-gray-700"
                        for=""> Sucursal asignada </label>

                    <input
                        class="block w-full h-10 transition duration-75 border-gray-300 rounded-lg shadow-sm focus:ring-1 focus:ring-inset focus:ring-blue-600 focus:border-blue-600"
                        id="direccsucursalasigion"
                        type="text" name="sucursalasig" value="{{old('sucursalasig',$servidor->sucursalasig)}}">

                </div>

                <div class="col-span-2 space-y-2 md:col-span-1">
                    <label class="inline-block text-sm font-medium text-gray-700"
                        for="ing_zona"> IP </label>

                    <input
                        class="block w-full transition duration-75 border-gray-300 rounded-lg shadow-sm focus:border-blue-600 focus:ring-1 focus:ring-inset focus:ring-blue-600"
                        id="ip" name="ip" value="{{old('ip', $servidor->ip)}}">
                </div>

                 <div class="col-span-2 space-y-2 md:col-span-1">
                    <label class="inline-block text-sm font-medium text-gray-700"
                        for="mascara"> Mascara </label>

                    <input
                        class="block w-full h-10 transition duration-75 border-gray-300 rounded-lg shadow-sm focus:ring-1 focus:ring-inset focus:ring-blue-600 focus:border-blue-600"
                        id="mascara"
                        type="text" name="mascara" value="{{old('mascara', $servidor->mascara)}}">

                </div>

                <div class="col-span-2 space-y-2 md:col-span-1">
                    <label class="inline-block text-sm font-medium text-gray-700"
                        for="">GATEWAY</label>

                    <input
                        class="block w-full h-10 transition duration-75 border-gray-300 rounded-lg shadow-sm focus:ring-1 focus:ring-inset focus:ring-blue-600 focus:border-blue-600"
                        id="gateway"
                        type="text" name="gateway" value="{{old('gateway', $servidor->gateway)}}">
                </div>

                <div class="col-span-2 space-y-2 md:col-span-1">
                    <label class="inline-block text-sm font-medium text-gray-700"
                        for="">DNS</label>

                    <input
                        class="block w-full h-10 transition duration-75 border-gray-300 rounded-lg shadow-sm focus:ring-1 focus:ring-inset focus:ring-blue-600 focus:border-blue-600"
                        id="dns"
                        type="text" name="dns" value="{{old('dns', $servidor->dns)}}">
                </div>

                <div class="col-span-2 space-y-2 md:col-span-1">
                    <label class="inline-block text-sm font-medium text-gray-700"
                        for="">Imagen</label>

                    <input
                        class="block w-full h-10 transition duration-75 border-gray-300 rounded-lg shadow-sm focus:ring-1 focus:ring-inset focus:ring-blue-600 focus:border-blue-600"
                        type="file" name="imagen" accept="image/*" value="{{old('imagen', $servidor->imagen)}}">
                </div>

                <div class="col-span-2 space-y-2 md:col-span-1">
                    <label class="inline-block text-sm font-medium text-gray-700"
                        for="">status</label>

                    <input
                        class="block w-full h-10 transition duration-75 border-gray-300 rounded-lg shadow-sm focus:ring-1 focus:ring-inset focus:ring-blue-600 focus:border-blue-600"
                        id="status"
                        type="text" name="status" value="{{old('status', $servidor->status)}}">

            </div>

            <footer class="flex items-center justify-end px-4 py-2 space-x-4">
                <button
                    class="inline-flex items-center justify-center h-8 px-3 text-sm font-semibold tracking-tight text-white transition bg-blue-600 rounded-lg shadow hover:bg-blue-500 focus:bg-blue-700 focus:outline-none focus:ring-offset-2 focus:ring-offset-blue-700 focus:ring-2 focus:ring-white focus:ring-inset"
                    type="submit">Guardar</button>
                    
                    <a href="{{route('servidores.index')}}" class="btn btn-outline-secondary">Cancelar</a>
            </footer> 
        </form>
    </div>
</body>
@endsection