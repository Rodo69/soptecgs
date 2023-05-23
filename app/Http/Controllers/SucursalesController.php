<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\sucursales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SucursalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['sucursales']=Sucursales::paginate(5);
        return view('sucursales.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoria=categoria::all();
        return view('sucursales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validar datos
        
        $campos=[
            'nombre'=>'required|string|max:100',
            'direccion'=>'required|string|max:100',
            'ingeniero_zona'=>'required|string|max:100',
            'telefono_ing'=>'required|string|max:100',
            'gerente_tienda'=>'required|string|max:100',
            'telefono_gerente'=>'required|string|max:100',
            'banco_azteca'=>'required|string|max:100',
            'presta_prenda'=>'required|string|max:100',
            'comercio'=>'required|string|max:100',
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',
            'foto_equipo.required'=>'La foto es requerida'
        ];
        $this->validate($request,$campos,$mensaje);
        $datosSucursal= request()->except('_token');
        if($request->hasFile('imagen')){
            $datosSucursal['imagen']=$request->file('imagen')->store('uploads','public');
        }
        Sucursales::insert($datosSucursal);
        return redirect('sucursales')->with('mensaje','Empleado Agregado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(sucursales $sucursales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categoria=categoria::all();
        $sucursal=sucursales::FindOrFail($id);
        return view('sucursales.edit',compact('sucursal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'nombre'=>'required|string|max:100',
            'direccion'=>'required|string|max:100',
            'ingeniero_zona'=>'required|string|max:100',
            'telefono_ing'=>'required|string|max:100',
            'gerente_tienda'=>'required|string|max:100',
            'telefono_gerente'=>'required|string|max:100',
            'banco_azteca'=>'required|string|max:100',
            'presta_prenda'=>'required|string|max:100',
            'comercio'=>'required|string|max:100',
            
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',
        ];
        $this->validate($request,$campos,$mensaje);
        if($request->hasFile('imagen')){
            $campos=['imagen'=>'required|max:10000|mimes:jpeg,png,jpg',];
            $mensaje=['imagen.required'=>'La foto es requerida'];
        }

        $datosSucursal= request()->except(['_token','_method']);

        if($request->hasFile('imagen')){
            $sucursal=Sucursales::FindOrFail($id);
            Storage::delete('public/'.$sucursal->imagen);
            $datosSucursal['imagen']=$request->file('imagen')->store('uploads','public');
        }
        Sucursales::where('id','=',$id)->update($datosSucursal);
        $sucursal=Sucursales::FindOrFail($id);
        //return view('empleado.edit',compact('empleado'));
        return redirect('sucursales')->with('mensaje','Sucursal modificado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sucursal=Sucursales::FindOrFail($id);
        
        if(Storage::delete('public/'.$sucursal->imagen)){
            Sucursales::destroy($id);
        }
        return redirect('sucursales')->with('mensaje','Sucursal Eliminada');
    }
}
