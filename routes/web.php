<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SucursalController;
use Faker\Guesser\Name;
//PARA FUNCIONAR CON RUTAS DE EMPLEADO
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\EquiposController;
use App\Http\Controllers\SucursalesController;
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

<<<<<<< Updated upstream
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



Route::get('/', function () {
    return view('welcome');
});
Route::get('/empleado/create',[EmpleadosController::class,'create']);
Route::resource('empleado', EmpleadosController::class)->middleware('auth');

Route::get('/equipos/create',[EquiposController::class,'create']);
Route::resource('equipos', EquiposController::class)->middleware('auth');

Route::get('/sucursales/create',[SucursalesController::class,'create']);
Route::resource('sucursales', SucursalesController::class)->middleware('auth');
Auth::routes();
////AQUI DEFINIMOS LA RUTA A LA CUAL NOS CARGARA LA PAGINA
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'],function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
});
=======
Route::resource('actividades', ActividadesController::class);
>>>>>>> Stashed changes
