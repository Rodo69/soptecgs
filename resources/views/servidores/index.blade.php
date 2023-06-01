<!DOCTYPE html>
<html lang="en">
<head>
    @extends('layouts.appinventario')
    @section('content')
    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="myAlert">
    {{Session::get('mensaje')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <script>
          // Obtén la referencia a la alerta
          var alerta = document.getElementById('myAlert');
        
          // Cierra la alerta después de 5 segundos (5000 milisegundos)
          setTimeout(function() {
            alerta.classList.add('fade');
            alerta.classList.add('show');
            alerta.style.display = 'none';
          }, 3000);
        </script>
    </div>
    @endif
    <div class="container">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> SERVIDORES </title>
</head>
<body>
    <a href="{{route('servidores.create')}}" class="btn btn-outline-primary">Registar Nuevo Servidor</a>
<br><br>
<table class="table table-light.table-responsive{-sm|-md|-lg|-xl|-xxl}.">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Sucursal asignada</th>
        <th scope="col">IP</th>
        <th scope="col">MASCARA</th>
        <th scope="col">GATEWAY</th>
        <th scope="col">DNS</th>
        <th scope="col">Status</th>
        <th scope="col">Imagen</th>
        <th scope="col">Accion</th>
      </tr>
    </thead>
    <tbody>
              @foreach ($servidores as $servidor)
        <tr>
          <td>{{$servidor->id}}</td>
          <td>{{$servidor->nombre}}</td>
          <td>{{$servidor->sucursales->nombre}}</td>
          <td>{{$servidor->ip}}</td>
          <td>{{$servidor->mascara}}</td>
          <td>{{$servidor->gateway}}</td>
          <td>{{$servidor->dns}}</td>
          <td>{{$servidor->status}}</td>
          <td>
            <img class="img-thumbnail img-fluid" src="{{asset($servidor->imagen)}}" width="100" alt="" srcset="">
        </td>
          <td>    
          {{-- <a href="{{route('servidores.edit', $servidor->id)}}" class="btn btn-warning">Editar</a>

          <form action="{{route('servidores.destroy', $servidor)}}" class="d-inline"  method="POST">
            @csrf
            @method('delete')
            <br><button type="submit" class="btn btn-danger" onClick="return confirm('¿Eliminar definitivamente?')">Eliminar</button>
          </form> --}}
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar">
            Eliminar
        </button>

<!-- Modal -->
                <div class="modal fade" id="eliminar" tabindex="-1" aria-labelledby="eliminar" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                        
                      <h5 class="modal-title" id="eliminar" style="color:brown">¿Seguro que quieres eliminar?</h5>
                      
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                      <form action="{{route('servidores.destroy', $servidor)}}" class="d-inline" method="post">
                        @csrf    
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger">
                          Eliminar
                        </button>
                        </form>
                    </div>
                  </div>
                </div>
                </div>
 |
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Editar
            </button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background: #3393FF">
        <h5 class="modal-title" id="exampleModalLabel" style="color: white">ACTUALIZAR DATOS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="grid md:grid-cols-[2fr,3fr] gap-6 md:gap-12 mt-6">
        <aside>
            <p class="mt-1 text-gray-500">Todos los campos son obligatorios *</p>
        </aside>
    

                    <form 
                        action="{{route('servidores.update', $servidor->id)}}" method="post" enctype="multipart/form-data">

                        @csrf {{-- directiva --}}

                        @method('put')

                        <div class="input-group input-group-sm mb-3">
                          <span class="input-group-text" id="inputGroup-sizing-sm">Servidor</span>
                          <input id="nombre"
                          type="text" name="nombre" value="{{old('nombre', $servidor->nombre)}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            @error('nombre')
                            <br>
                            <small class="text-danger">*{{$message}}</small>
                            <br>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                          <label class="input-group-text" for="inputGroupSelect01">Sucursal asignada</label>
                          <select name="sucursalasig" class="form-select" id="inputGroupSelect01">
                              @foreach ($sucursales as $sucursal)
                              <option value="{{old('id',$sucursal->id )}}" @selected(old('nombre', $sucursal->nombre) == $sucursal)> {{$sucursal->nombre}} </option>

                                  {{-- <option value="{{$sucursal->id}}">{{$sucursal->nombre}}1</option> --}}
                              @endforeach
                          </select>
                              @error('sucursalasig')
                              <br>
                              <small class="text-danger">*{{$message}}</small>
                              <br>
                              @enderror
                        </div>

                        <div class="input-group input-group-sm mb-3">
                          <span class="input-group-text" id="inputGroup-sizing-sm">IP</span>
                          <input id="ip" name="ip" value="{{old('ip', $servidor->ip)}}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            @error('ip')
                            <br>
                            <small class="text-danger">*{{$message}}</small>
                            <br>
                            @enderror
                        </div>

                        <div class="input-group input-group-sm mb-3">
                          <span class="input-group-text" id="inputGroup-sizing-sm">Mascara</span>
                          <input id="mascara"
                          type="text" name="mascara" value="{{old('mascara', $servidor->mascara)}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                          @error('mascara')
                          <br>
                          <small class="text-danger">*{{$message}}</small>
                          <br>
                          @enderror
                        </div>

                        <div class="input-group input-group-sm mb-3">
                          <span class="input-group-text" id="inputGroup-sizing-sm">GATEWAY</span>
                          <input  id="gateway"
                          type="text" name="gateway" value="{{old('gateway', $servidor->gateway)}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                           
                          @error('gateway')
                            <br>
                            <small class="text-danger">*{{$message}}</small>
                            <br>
                            @enderror
                        </div>

                        <div class="input-group input-group-sm mb-3">
                          <span class="input-group-text" id="inputGroup-sizing-sm">DNS</span>
                          <input id="dns" type="text" name="dns" value="{{old('dns', $servidor->dns)}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            @error('dns')
                            <br>
                            <small class="text-danger">*{{$message}}</small>
                            <br>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                          <label class="input-group-text" for="inputGroupFile01">Imagen</label>
                          <input type="file" name="imagen" accept="image/*" value="{{old('imagen', $servidor->imagen)}}" class="form-control" id="inputGroupFile01">
                            @error('imagen')
                            <br>
                            <small class="text-danger">*{{$message}}</small>
                            <br>
                            @enderror   
                        </div>

                            <div class="input-group input-group-sm mb-3">
                              <span class="input-group-text" id="inputGroup-sizing-sm">STATUS</span>
                              <input tid="status" type="text" name="status" value="{{old('status', $servidor->status)}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                @error('status')
                                <br>
                                <small class="text-danger">*{{$message}}</small>
                                <br>
                                @enderror   
                            </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!!$servidores->Links()!!}
</div>


@endsection
</body>
</html>