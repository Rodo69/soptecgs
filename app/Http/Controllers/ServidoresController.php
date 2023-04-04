<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServidor;
use App\Models\Servidor;
use App\Models\servidores;
use App\Models\Sucursal;
use App\Models\sucursales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ServidoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $datos = servidores::all();
        //$servidores = servidores::orderBy('id', 'desc')->paginate(9);
       // return view('servidores.index', $servidores);
       $datos['servidores']=servidores::orderBy('id', 'desc')->paginate(5);
       return view('servidores.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sucursales=sucursales::all();
        return view('servidores.create', compact('sucursales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServidor $request, servidores $servidor)
    {
        $imagen = $request->file('imagen')->store('public/imagenes'); //metodo
        //$servidor = servidores::create($request->all());
            $servidor = servidores::create([
             'nombre' => $servidor->nombre = $request->nombre,
             'sucursalasig' => $servidor->sucursalasig = $request->sucursalasig,
             'ip' => $servidor->ip = $request->ip,
             'mascara' => $servidor->mascara = $request->mascara,
             'gateway' => $servidor->gateway = $request->gateway,
             'dns' => $servidor->dns = $request->dns,
             'imagen' => $imagen = Storage::url($imagen),
             'status' => $servidor->status = $request->status
        ]);
         $servidor->save();  

        return redirect()->route('servidores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\servidores  $servidores
     * @return \Illuminate\Http\Response
     */
    public function show(servidores $servidor)
    {
        return view('servidores.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\servidores  $servidores
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sucursales=sucursales::all();
        //return view('servidores.edit', compact('sucursales'));
        $servidor=servidores::FindOrFail($id);
        return view('servidores.edit',compact('servidor','sucursales'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\servidores  $servidores
     * @return \Illuminate\Http\Response
     */
    public function update(StoreServidor $request, $id)
    {
        $imagen = $request->file('imagen')->store('public/imagenes'); //metodo
        //$servidor = servidores::create($request->all());

        $servidor=servidores::findOrFail($id);
             $servidor->nombre = $request->nombre;
             $servidor->sucursalasig = $request->sucursalasig;
             $servidor->ip = $request->ip;
             $servidor->mascara = $request->mascara;
             $servidor->gateway = $request->gateway;
             $servidor->dns = $request->dns;
             $imagen = Storage::url($imagen);
             $servidor->status = $request->status;

        $servidor->save();  

        $servidor->update($request->all());
        return redirect()->route('servidores.index');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\servidores  $servidores
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sucursal=Servidores::FindOrFail($id);
        
        
            Servidores::destroy($id);
        
        return redirect('servidores')->with('mensaje','Empleado Borrado');
    }
}
