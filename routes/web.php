<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SucursalController;
use Faker\Guesser\Name;
//PARA FUNCIONAR CON RUTAS DE EMPLEADO
use App\Http\Controllers\EmpleadosController;
use App\Models\empleados;
use GuzzleHttp\Promise\Create;
//TERMINA AQUI

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

Route::get('sucursales', [SucursalController::class, 'index'])->name('sucursales.index');

Route::get('sucursales/create', [SucursalController::class, 'create'])->name('sucursales.create');

Route::post('sucursales', [SucursalController::class,'store'])->name('sucursales.store');

Route::get('sucursales/{sucursal}', [SucursalController::class, 'show'])->name('sucursales.show');

Route::get('sucursales/{sucursal}/edit', function ($sucursal){
    return "vista editar";
});

Route::put('sucursales/{sucursal}', function ($sucursal){
    return "vista acatualizar";
});

Route::delete('sucursales/{sucursal}', function (){
  
});

Route::get('servidores', function (){
    return "vista sucursal";
});

Route::get('servidores/create', function (){
    return "vista para crear una sucursal";
});

Route::get('servidores/{servidor}', function ($servidor){
    return "vista sucursal:" ;
});

Route::get('servidores/{servidor}/edit', function ($servidor){
    return "vista editar";
});

Route::put('servidores/{servidores}', function ($servidor){
    return "vista acatualizar";
});

Route::delete('servidores/{servidores}', function ($servidor){
    return "vista eliminar";
});
// RUTAS INVENTARIO
Route::resource('empleado', EmpleadosController::class);