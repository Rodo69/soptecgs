<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(){
        return view('welcome');
    }

    public function index()
    {
        return view('home');

        return view('sucursales.index');
    }

}