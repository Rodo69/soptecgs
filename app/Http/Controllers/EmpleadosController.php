<?php

namespace App\Http\Controllers;

use App\Models\empleados;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['empleados']=Empleados::paginate(5);
        return view('empleado.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validar datos
        
        $campos=[
            'nombre_colaborador'=>'required|string|max:100',
            'apellido_p'=>'required|string|max:100',
            'apellido_m'=>'required|string|max:100',
            'telefono'=>'required|string|max:100',
            'numero_colaborador'=>'required|string|max:100',
            'sucursal_asignada'=>'required|string|max:100',
            'unidad_asignada'=>'required|string|max:100',
            'puesto'=>'required|string|max:100',
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',
        ];
        $this->validate($request,$campos,$mensaje);
        $datosEmpleado= request()->except('_token');
        Empleados::insert($datosEmpleado);
        return redirect('empleado')->with('mensaje','Empleado Agregado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $empleado=Empleados::FindOrFail($id);
        return view('empleado.edit',compact('empleado'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $campos=[
            'nombre_colaborador'=>'required|string|max:100',
            'apellido_p'=>'required|string|max:100',
            'apellido_m'=>'required|string|max:100',
            'telefono'=>'required|string|max:100',
            'numero_colaborador'=>'required|string|max:100',
            'sucursal_asignada'=>'required|string|max:100',
            'unidad_asignada'=>'required|string|max:100',
            'puesto'=>'required|string|max:100',
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',
        ];
        $this->validate($request,$campos,$mensaje);
        $datosEmpleado= request()->except(['_token','_method']);
        Empleados::where('id','=',$id)->update($datosEmpleado);
        $empleado=Empleados::FindOrFail($id);
        return redirect('empleado')->with('mensaje','Empleado modificado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $empleado=Empleados::FindOrFail($id);
        Empleados::destroy($id);
        return redirect('empleado')->with('mensaje','Empleado Borrado');
    }
}
