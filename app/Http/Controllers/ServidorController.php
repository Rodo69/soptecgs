<?php

namespace App\Http\Controllers;

use App\Models\Servidor;
use Illuminate\Http\Request;

class ServidorController extends Controller
{
    public function index()
    {
        //$sucursal = Sucursal::orderBy('id', 'desc')->paginate(9);
        return view('servidores.index');
    }

    public function create()
    {
        return view('servidores.create');
    }

    public function store(Request $request, Servidor $servidor)
    {
        $servidor = Servidor::create([
            'nombre' => $servidor->nombre = $request->nombre,
            'sucursalasig' => $servidor->sucursalasig = $request->sucursalasig,
            'mascara' => $servidor->mascara = $request->mascara,
            'gateway' => $servidor->gateway = $request->gateway,
            'dns' => $servidor->dns = $request->dns,
            //'url' =>$imagen = Storage::url($imagen),
            'imagen' =>$servidor = $request->imagen,
            'status' => $servidor->status = $request->status
        ]);
        $servidor->save();
        //return redirect()->route('sucursales.show', $sucursal);

    }
}
