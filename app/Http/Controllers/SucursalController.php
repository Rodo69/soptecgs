<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    public function index()
    {
        //$sucursal = Sucursal::orderBy('id', 'desc')->paginate(9);
        return view('sucursales.index');
    }

    public function create()
    {
        return view('sucursales.create');
    }

    public function store(Request $request, Sucursal $sucursal)
    {
        $sucursal = Sucursal::create([
            'nombre' => $sucursal->nombre = $request->nombre,
            'direccion' => $sucursal->direccion = $request->direccion
            // 'url' =>$imagen = Storage::url($imagen),
            // 'descripcion' => $sucursal->descripcion = $request->descripcion,
            // 'tipo_poke' => $sucursal->tipo_poke = $request->tipo_poke,
            // 'genero' => $sucursal->genero = $request->genero,
            // 'slug' =>  $sucursal->slug = Str::slug($request->name, '-'),
            // 'region' => $sucursal->region = $request->region
        ]);
        $sucursal->save();
        //return redirect()->route('sucursales.show', $sucursal);

    }

    public function show($sucursal)
    {
        return view('sucursales.show', compact('sucursal'));
    }

    public function edit()
    {
    }

    public function update()
    {

    }

    public function destroy()
    {
        return "vista eliminar";
    }
}
