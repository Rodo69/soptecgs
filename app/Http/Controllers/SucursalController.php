<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SucursalController extends Controller
{
    public function index()
    {
        return "vista sucursal";
    }

    public function create()
    {
        return view('sucursales.create');
    }

    public function store(Request $request)
    {
  
    }

    public function show($sucursal)
    {
        return "vista sucursal: $sucursal";
    }

    public function edit()
    {
    }

    public function update()
    {

    }

    public function destroy()
    {
        return "vista eliminar";
    }
}
