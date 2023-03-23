<?php

namespace App\Http\Controllers;

use App\Models\equipos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['equipos']=Equipos::paginate(5);
        return view('equipos.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('equipos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datosEquipo= request()->except('_token');
        if($request->hasFile('foto_equipo')){
            $datosEquipo['foto_equipo']=$request->file('foto_equipo')->store('uploads','public');
        }
        Equipos::insert($datosEquipo);
        return redirect('equipos')->with('mensaje','Empleado Agregado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(equipos $equipos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $equipo=Equipos::FindOrFail($id);
        return view('equipos.edit',compact('equipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'tipo'=>'required|string|max:100',
            'marca'=>'required|string|max:100',
            'modelo'=>'required|string|max:100',
            'serie'=>'required|string|max:100',
            'placa'=>'required|string|max:100',
            'empleado_asig'=>'required|string|max:100',
            'sucursal_asig'=>'required|string|max:100',
            'unidad_asig'=>'required|string|max:100',
            'nombre_equipo'=>'required|string|max:100',
            
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',
        ];
        $this->validate($request,$campos,$mensaje);
        if($request->hasFile('foto_equipo')){
            $campos=['foto_equipo'=>'required|max:10000|mimes:jpeg,png,jpg',];
            $mensaje=['foto_equipo.required'=>'La foto es requerida'];
        }

        $datosEquipo= request()->except(['_token','_method']);

        if($request->hasFile('foto_equipo')){
            $equipo=Equipos::FindOrFail($id);
            Storage::delete('public/'.$equipo->foto_equipo);
            $datosEquipo['foto_equipo']=$request->file('foto_equipo')->store('uploads','public');
        }
        Equipos::where('id','=',$id)->update($datosEquipo);
        $equipo=Equipos::FindOrFail($id);
        //return view('empleado.edit',compact('empleado'));
        return redirect('equipos')->with('mensaje','Empleado modificado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $equipo=Equipos::FindOrFail($id);
        
        if(Storage::delete('public/'.$equipo->foto_equipo)){
            Equipos::destroy($id);
        }
        return redirect('equipos')->with('mensaje','Empleado Borrado');
    }
}
