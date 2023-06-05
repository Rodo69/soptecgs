<?php

namespace App\Http\Controllers;

use App\Models\actividades;
use App\Models\sucursales;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ActividadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sucursales=sucursales::all();
        return view('actividades.index', compact('sucursales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // // validando información
        request()->validate(actividades::$rules);
        // // ORM eloquen
        $actividades=actividades::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(actividades $actividades)
    {
        $actividades= actividades::all();
        return response()->json($actividades);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $actividades=actividades::find($id);

        $actividades->start=Carbon::createFromFormat('Y-m-d H:i:s', $actividades->start)->format('Y-m-d');
        $actividades->end=Carbon::createFromFormat('Y-m-d H:i:s', $actividades->end)->format('Y-m-d');

        return response()->json($actividades);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, actividades $actividades)
    {
        request()->validate(actividades::$rules);
        
        $actividades->update($request->all());

        return response()->json($actividades);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $actividades=actividades::find($request->id)->delete();
        
        return response()->json($actividades);
    }
}
