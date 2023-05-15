<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\empleados;
use App\Models\equipos;
use App\Models\sucursales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class EquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['equipos']=Equipos::all();
       //s $datospdf['equipo']=Equipos::all(5);
        return view('equipos.index',$datos);
    }

    public function pdf()
    {
        $equipos=Equipos::paginate();
        //return view('empleado.pdf',compact('empleados'));
        $pdf=PDF::loadView('equipos.pdf',['equipos'=>$equipos]);  
        return $pdf->setPaper('a4','landscape')->stream();
    }

    public function pdfbaja($id)
    {
        
        $equipo = Equipos::find($id);
        //dd($empleado);
        //return view('empleado.pdfbaja',compact('empleado'));
        $pdf=PDF::loadView('equipos.pdfbaja',['equipo'=>$equipo]);
        return $pdf->setPaper('a4','landscape')->stream();
    }
    public function pdfalta($id)
    {
        
        $equipo = Equipos::find($id);
        //dd($empleado);
        //return view('empleado.pdfbaja',compact('empleado'));
        $pdf=PDF::loadView('equipos.pdfalta',['equipo'=>$equipo]);
        return $pdf->setPaper('a4','landscape')->stream('pdfalta.pdf');
    }

   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empleados = Empleados::all();
        $sucursales = sucursales::all();
        $categorias = categoria::all();
        return view('equipos.create',compact('empleados','sucursales','categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validar datos
        
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
        $datosEquipo= request()->except('_token');
//        $equipo=Equipos::FindOrFail($id);
        $equipo = Equipos::create($datosEquipo);
        //$equipo = Equipos::where('id','=',$id)->insert($datosEquipo);
        //$equipo=Equipos::FindOrFail($id);
        return redirect()->route('equipos.pdfprueba',$equipo->id);
        //return redirect('equipos')->with('mensaje','Equipo Agregado con exito');
        
    }

    public function prueba(equipos $equipo)
    {
        return view('equipos.pdfprueba', compact('equipo'));
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
        $empleados = Empleados::all();
        $sucursales = sucursales::all();
        $categorias = categoria::all();
        $equipo=Equipos::FindOrFail($id);
        return view('equipos.edit',compact('equipo','empleados','sucursales','categorias'));
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
        return redirect('equipos')->with('mensaje','Equipo modificado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        
        // if(Storage::delete('public/'.$equipo->foto_equipo)){
        //     Equipos::destroy($id);
        // }
        $equipo=Equipos::FindOrFail($id);
        return redirect()->route('equipos.pdfprueba',$equipo->id);
        Equipos::destroy($id);
        //return redirect('equipos')->with('mensaje','Equipo Borrado');
    }
}
