<?php

namespace App\Http\Controllers;

use App\Models\empleados;
use App\Models\categoria;
use App\Models\sucursales;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Http;


class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['empleados']=Empleados::all();
        return view('empleado.index',$datos);
    }

    public function pdf()
    {
        $empleados=Empleados::paginate();
        //return view('empleado.pdf',compact('empleados'));
        $pdf=PDF::loadView('empleado.pdf',['empleados'=>$empleados]);  
        return $pdf->setPaper('a4','landscape')->stream();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sucursales = sucursales::all();
        $categorias = categoria::all();
        return view('empleado.create',compact('sucursales','categorias'));
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
            'numero_colaborador'=>'required|string|max:100|unique:empleados,numero_colaborador',
            'sucursal_asignada'=>'required|string|max:100',
            'unidad_asignada'=>'required|string|max:100',
            'puesto'=>'required|string|max:100',
            'g-recaptcha-response'=>['required',new \App\Rules\Recaptcha]
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',
        ];
        $this->validate($request,$campos,$mensaje);
        $datosEmpleado= request()->except('_token','g-recaptcha-response');
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
        $categorias = categoria::all();
        $sucursales = sucursales::all();
        return view('empleado.edit',compact('empleado','categorias','sucursales'));
        
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
            'telefono'=>'required|string|min:10|max:10',
            'numero_colaborador'=>'required|string|min:6|max:6|unique:empleados,numero_colaborador',
            'sucursal_asignada'=>'required|string|max:100',
            'unidad_asignada'=>'required|string|max:100',
            'puesto'=>'required|string|max:100',
            'g-recaptcha-response'=>['required',new \App\Rules\Recaptcha]
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',
        ];
        $this->validate($request,$campos,$mensaje);
        $datosEmpleado= request()->except(['_token','_method','g-recaptcha-response']);
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
