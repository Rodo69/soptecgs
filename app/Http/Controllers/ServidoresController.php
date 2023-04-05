<?php

namespace App\Http\Controllers;

<<<<<<< Updated upstream
use App\Models\servidores;
=======
use App\Http\Requests\StoreServidor;
use App\Models\servidores;
use App\Models\sucursales;
>>>>>>> Stashed changes
use Illuminate\Http\Request;

class ServidoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(servidores $servidores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(servidores $servidores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, servidores $servidores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(servidores $servidores)
    {
        //
    }
}
