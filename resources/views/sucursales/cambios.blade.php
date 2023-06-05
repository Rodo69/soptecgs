{{-- FORMULARIO EN FORM.BLADE.PHP--}}

{{-- <div class="form-group">
    <label for="Nombre">Unidad Asignada</label>
    <select name="banco_azteca" id="banco_azteca" class="form-control">
        @foreach ($categorias as $categoria)
        <option id="banco_azteca" value="{{$categoria->id}}">{{$categoria->nombre}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="Nombre">Unidad Asignada</label>
    <select name="presta_prenda" id="presta_prenda" class="form-control">
        @foreach ($categorias as $categoria1)
        <option id="presta_prenda" value="{{$categoria1->id}}">{{$categoria1->nombre}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="Nombre">Unidad Asignada</label>
    <select name="comercio" id="comercio" class="form-control">
        @foreach ($categorias as $categoria2)
        <option id="comercio" value="{{ $categoria2->id}}">{{$categoria2->nombre}}</option>
        @endforeach
    </select>
</div>
     --}}

     {{-- TABLAAAAA BD --}}
 
            {{-- // $table->unsignedBigInteger('unidad_asignada');
            // $table->unsignedBigInteger('unidad_asignada2');
            // $table->unsignedBigInteger('unidad_asignada3'); --}}
{{-- 
            
            // $table->foreign('unidad_asignada')->references('id')->on('categorias')->onDelete('cascade');
            // $table->foreign('unidad_asignada2')->references('id')->on('categorias')->onDelete('cascade');
            // $table->foreign('unidad_asignada3')->references('id')->on('categorias')->onDelete('cascade'); --}}

            {{-- MODELOOO CATEGORIAAA--}}

            
    {{-- public function sucursales()
    {
      ...................defaul return $this->hasMany('App\Models\Sucursal', 'categoria');
    }
    
    // public function sucursales()
    // {
    //    return $this->hasMany('App\Models\sucursal', 'sucursal');
    // } --}}

    {{-- MODELO SUCURSALES --}}

    {{-- // public function categoria()
    // {
    //     return $this->belongsTo(Categoria::class,'unidad_asignada');
    // }
    // public function categoria()
    // {
    //    return $this->hasMany('App\Models\Categoria', 'categoria');
   //  // }
   //  public function categoria()
   //  {
   //     return $this->belongsTo(categoria::class, 'unidad_asignada');
   //  }

   //  public function categoria1()
   //  {
   //     return $this->belongsTo(categoria::class, 'unidad_asignada2');
   //  }

   //  public function categoria2()
   //  {
   //     return $this->belongsTo(categoria::class, 'unidad_asignada3');
   //  } --}}

   {{-- CONTROLLER --}}
{{-- 
   $sucursales=sucursales::all();
   $categorias = categoria::all();
   return view('sucursales.edit',compact('sucursales','categorias'));
} --}}