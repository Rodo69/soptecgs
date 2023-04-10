<?php

namespace App\Http\Controllers;

use App\Models\equiposbaja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EquiposbajaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['equiposbaja']=equiposbaja::paginate(1);
        return view('bajas.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bajas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $campos=[
            'tipo'=>'required|string|max:100',
            'placa'=>'required|string|max:100',
            'serie'=>'required|string|max:100',
            'foto_equipo'=>'required|max:10000|mimes:jpeg,png,jpg',
            'modelo'=>'required|string|max:100',
            'ing_cargo'=>'required|string|max:100',
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',
            'foto_equipo.required'=>'La foto es requerida'
        ];
        $this->validate($request,$campos,$mensaje);
        $datosEquipo= request()->except('_token');
        if($request->hasFile('foto_equipo')){
            $datosEquipo['foto_equipo']=$request->file('foto_equipo')->store('uploads','public');
        }
        equiposbaja::insert($datosEquipo);
        return redirect('bajas')->with('mensaje','Equipo Agregado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(equiposbaja $equiposbaja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $equipo=equiposbaja::FindOrFail($id);
        return view('bajas.edit',compact('equipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'tipo'=>'required|string|max:100',
            'placa'=>'required|string|max:100',
            'serie'=>'required|string|max:100',
            'modelo'=>'required|string|max:100',
            'ing_cargo'=>'required|string|max:100',
            
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
            $equipo=equiposbaja::FindOrFail($id);
            Storage::delete('public/'.$equipo->foto_equipo);
            $datosEquipo['foto_equipo']=$request->file('foto_equipo')->store('uploads','public');
        }
        equiposbaja::where('id','=',$id)->update($datosEquipo);
        $equipo=equiposbaja::FindOrFail($id);
        //return view('empleado.edit',compact('empleado'));
        return redirect('bajas')->with('mensaje','Equipo modificado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $equipo=equiposbaja::FindOrFail($id);
        
        if(Storage::delete('public/'.$equipo->foto_equipo)){
            equiposbaja::destroy($id);
        }
        return redirect('bajas')->with('mensaje','Equipo Borrado');
    }
}
