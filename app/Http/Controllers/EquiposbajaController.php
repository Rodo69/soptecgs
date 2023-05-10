<?php

namespace App\Http\Controllers;

//use App\Models\equipos;
use App\Models\equiposbaja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
class EquiposbajaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

      
        $datos['equiposbaja']=equiposbaja::paginate(5);
        return view('bajas.index',$datos);
    }

    public function pdf()
    {
        $equiposbaja=equiposbaja::paginate();
        $pdf = PDF::loadView('bajas.pdf',['equiposbaja'=>$equiposbaja]);
        return $pdf->stream();
       // return view('bajas.pdf',compact('equiposbaja')); 
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bajas.create');
    }

    /**La siguiente funcion direcciona a la pagina principal de los equipos obosoletos,generando una consulta general de
    los equipos, asi como un paginado en caso de que el registro de los equipos obsoletos sea mayor a 5*/
    public function store(Request $request)
    {
        $campos=[
            'tipo'=>'required|string|max:100',
            'modelo'=>'required|string|max:100',
            'marca'=>'required|string|max:100',
            'placa'=>'required|string|max:100',
            'serie'=>'required|string|max:100',
            'descripcion'=>'required|string|max:100',
            'foto_obsoleto'=>'required|max:10000|mimes:jpeg,png,jpg',
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',
            'foto_obsoleto.required'=>'La foto es requerida'
        ];
        $this->validate($request,$campos,$mensaje);
        $datosEquipo= request()->except('_token');
        if($request->hasFile('foto_obsoleto')){
            $datosEquipo['foto_obsoleto']=$request->file('foto_obsoleto')->store('uploads','public');
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

    /**Dentro de la siguiente función se crea una variable con el nombre de los campos que vamos a insertar en la BDD,
     al momento de insertarlos mostrará un mensaje al usuario y lo direccionará a la pagina principal.*/
  
    public function update(Request $request, $id)
    {
        $campos=[
            'tipo'=>'required|string|max:100',
            'modelo'=>'required|string|max:100',   
            'marca'=>'required|string|max:100',   
            'placa'=>'required|string|max:100',
            'serie'=>'required|string|max:100',
            'descripcion'=>'required|string|max:100',   
             
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',
        ];
        $this->validate($request,$campos,$mensaje);
        if($request->hasFile('foto_obsoleto')){
            $campos=['foto_obsoleto'=>'required|max:10000|mimes:jpeg,png,jpg',];
            $mensaje=['foto_obsoleto.required'=>'La foto es requerida'];
        }

        $datosEquipo= request()->except(['_token','_method']);

        if($request->hasFile('foto_obsoleto')){
            $equipo=equiposbaja::FindOrFail($id);
            Storage::delete('public/'.$equipo->foto_equipo);
            $datosEquipo['foto_obsoleto']=$request->file('foto_obsoleto')->store('uploads','public');
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
        
        if(Storage::delete('public/'.$equipo->foto_obsoleto)){
            equiposbaja::destroy($id);
        }
        return redirect('bajas')->with('mensaje','Equipo Borrado');
    }
}
