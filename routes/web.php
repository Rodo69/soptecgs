<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServidoresController;
use App\Http\Controllers\SucursalController;
use Faker\Guesser\Name;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class);

Route::get('home', [HomeController::class, 'index']);

//Rutas sucursales

Route::resource('sucursales', SucursalController::class);

//Rutas Servidores

Route::resource('servidores', ServidoresController::class);

// Route::get('sucursales', [SucursalController::class, 'index'])->name('sucursales.index');

// Route::get('sucursales/create', [SucursalController::class, 'create'])->name('sucursales.create');

// Route::post('sucursales', [SucursalController::class,'store'])->name('sucursales.store');

// Route::get('sucursales/{sucursal}', [SucursalController::class, 'show'])->name('sucursales.show');

// Route::get('sucursales/{sucursal}/edit', function ($sucursal){
//     return "vista editar";
// });

// Route::put('sucursales/{sucursal}', function ($sucursal){
//     return "vista acatualizar";
// });

// Route::delete('sucursales/{sucursal}', function (){
  
// });
