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
use App\Http\Controllers\ServidoresController;
use App\Http\Controllers\SucursalesController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\EquiposObsoletosController;
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

//Route::get('home', [HomeController::class, 'index']);

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('bajas/pdf',[App\Http\Controllers\EquiposbajaController::class,'pdf'])->name('bajas.pdf') ;

Route::get('/servidores/create',[ServidoresController::class,'create']);
Route::resource('servidores', ServidoresController::class)->middleware('auth');

Route::get('/actividades/create', [ActividadesController::class,'create']);
Route::resource('actividades', ActividadesController::class)->middleware('auth');

Route::get('/empleado/create',[EmpleadosController::class,'create']);
Route::resource('empleado', EmpleadosController::class)->middleware('auth');

Route::get('/equipos/create',[EquiposController::class,'create']);
Route::resource('equipos', EquiposController::class)->middleware('auth');

Route::get('/sucursales/create',[SucursalesController::class,'create']);
Route::resource('sucursales', SucursalesController::class)->middleware('auth');

//RUTAS DE MANTENIMIENTOS A SUCURSALES
Route::get('/checklist/create',[ChecklistController::class,'create']);
Route::resource('checklist', ChecklistController::class)->middleware('auth');

//RUTAS DE EQUIPOSDAÑADOS 
Route::get('/bajas/create',[EquiposbajaController::class,'create']);
Route::resource('bajas', EquiposbajaController::class)->middleware('auth');


Auth::routes();
////AQUI DEFINIMOS LA RUTA A LA CUAL NOS CARGARA LA PAGINA
 Route::get('/home', [HomeController::class, 'index'])->name('home');
//RUTA DE PDF EMPLEADOS
Route::get('empleados/pdf',[EmpleadosController::class,'pdf'])->name('empleados.pdf');

