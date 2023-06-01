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

////AQUI DEFINIMOS LA RUTA A LA CUAL NOS CARGARA LA PAGINA
// Route::get('/home', [HomeController::class, 'index'])->middleware('auth');

Route::get('bajas/pdf',[App\Http\Controllers\EquiposbajaController::class,'pdf'])->name('bajas.pdf') ;

Route::get('/servidores/create',[ServidoresController::class,'create']);
Route::resource('servidores', ServidoresController::class)->middleware('auth');

Route::get('/actividades/create', [ActividadesController::class,'create']);
Route::get('/actividades/mostrar',[ActividadesController::class,'show']);
Route::post('/actividades/agregar',[ActividadesController::class,'store']);
Route::post('/actividades/editar/{id}',[ActividadesController::class,'edit']);
Route::post('/actividades/update/{actividad}',[ActividadesController::class,'update']);
Route::post('/actividades/borrar/{id}',[ActividadesController::class,'destroy']);
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
Route::get('bajas/{obsoletos}',[App\Http\Controllers\EquiposbajaController::class,'show'])->name('bajas.show') ;;

Auth::routes();

//RUTA DE PDF EMPLEADOS Y EQUIPOS
Route::get('empleados/pdf',[EmpleadosController::class,'pdf'])->name('empleados.pdf');
Route::get('equipo/pdf',[EquiposController::class,'pdf'])->name('equipos.pdf');


Route::get('equipo/{equipo}',[EquiposController::class,'pdfbaja'])->name('equipo.pdfbaja');
Route::get('equipo/{equipo}',[EquiposController::class,'pdfalta'])->name('equipo.pdfalta');
Route::get('equipos/{equipo}',[EquiposController::class,'pdfalta'])->name('equipos.pdfprueba');
//Route::get('equipo/{equipo}',[EquiposController::class,'pdfalta'])->name('equipo.pdfalta');
//Route::get('/equipos/pdfalta',[EquiposController::class,'store'])->name('equipos.pdfalta');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
