<?php

use App\Http\Controllers\ActividadesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SucursalController;
use Faker\Guesser\Name;
//PARA FUNCIONAR CON RUTAS DE EMPLEADO
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\EquiposbajaController;
use App\Http\Controllers\EquiposController;
use App\Http\Controllers\SucursalesController;
use App\Models\empleados;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;

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

//Rutas sucursales

Route::resource('sucursales', SucursalController::class);

//Rutas Servidores

Route::resource('servidores', ServidoresController::class);

Route::resource('actividades', ActividadesController::class);
//RUTAS
Route::resource('bajas', EquiposbajaController::class);

Route::get('/', function () {
    return view('welcome');
});
Route::get('/empleado/create',[EmpleadosController::class,'create']);
Route::resource('empleado', EmpleadosController::class)->middleware('auth');

Route::get('/equipos/create',[EquiposController::class,'create']);
Route::resource('equipos', EquiposController::class)->middleware('auth');

Route::get('/sucursales/create',[SucursalesController::class,'create']);
Route::resource('sucursales', SucursalesController::class)->middleware('auth');

Route::get('/bajas/create',[EquiposbajaController::class,'create']);
Route::resource('bajas', EquiposbajaController::class)->middleware('auth');
Auth::routes();
////AQUI DEFINIMOS LA RUTA A LA CUAL NOS CARGARA LA PAGINA
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'],function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
});

