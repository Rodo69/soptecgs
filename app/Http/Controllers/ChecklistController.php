<?php

namespace App\Http\Controllers;

use App\Models\checklist;
use App\Models\sucursales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChecklistController extends Controller
{
    
    public function index()
    {
       
         $datos['cheklist']=checklist::paginate(5);
        return view('checklist.index',$datos);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sucursales = sucursales::all();
        return view('checklist.create',compact('sucursales'));
    }
  
    public function store(Request $request)
    {
        $campos=[
            'sucursal_name'=>'required|string|max:100',
            'fecha_registro'=>'required|string|max:100',
            'foto_fachada'=>'required|max:10000|mimes:jpeg,png,jpg',
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',
            'foto_fachada.required'=>'La foto es requerida'
        ];
        $this->validate($request,$campos,$mensaje);
        $datosChecklist= request()->except('_token');
        if($request->hasFile('foto_fachada')){
            $datosChecklist['foto_fachada']=$request->file('foto_fachada')->store('uploads','public');
        }
        checklist::insert($datosChecklist);
        return redirect('checklist')->with('mensaje','Mantenimiento Agregado con exito');
    }
    /**
     * Display the specified resource.
     */
    public function show(checklist $checklist)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
      
        $checklistedit=checklist::FindOrFail($id);
        $sucursales = sucursales::all();
        return view('checklist.edit',compact('checklistedit','sucursales'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'sucursal_name'=>'required|string|max:100',
            'fecha_registro'=>'required|string|max:100',
            'foto_fachada'=>'required|max:10000|mimes:jpeg,png,jpg',
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',
        ];
        $this->validate($request,$campos,$mensaje);
        if($request->hasFile('foto_fachada')){
            $campos=['foto_fachada'=>'required|max:10000|mimes:jpeg,png,jpg',];
            $mensaje=['foto_fachada.required'=>'La foto es requerida'];
        }

        $datosEquipo= request()->except(['_token','_method']);

        if($request->hasFile('foto_fachada')){
            $equipo=checklist::FindOrFail($id);
            Storage::delete('public/'.$equipo->foto_fachada);
            $datosEquipo['foto_fachada']=$request->file('foto_fachada')->store('uploads','public');
        }
        checklist::where('id','=',$id)->update($datosEquipo);
        $equipo=checklist::FindOrFail($id);
        //return view('empleado.edit',compact('empleado'));
        return redirect('checklist')->with('mensaje','Mantenimiento modificado');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $checklistedit=checklist::FindOrFail($id);
        
        if(Storage::delete('public/'.$checklistedit->foto_fachada)){
            checklist::destroy($id);
        }
        return redirect('checklist')->with('mensaje','eliminado');
    }
}
