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
<<<<<<< Updated upstream
        return view('welcome');
=======
        return view('home');
>>>>>>> Stashed changes
    }
}