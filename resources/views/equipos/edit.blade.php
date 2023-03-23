<div class="container">
    <form action="{{ url('/equipos/' . $equipo->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        @include('equipos.form', ['modo' => 'Editar']);
    </form>
</div>
