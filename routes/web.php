<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('sucursales', function (){
    return "vista sucursal";
});

Route::get('sucursales/create', function (){
    return "vista para crear una sucursal";
});

Route::get('sucursales/{sucursal}', function ($sucursal){
    return "vista sucursal: $sucursal";
});

Route::get('sucursales/{sucursal}/edit', function ($sucursal){
    return "vista editar";
});

Route::put('sucursales/{sucursal}', function ($sucursal){
    return "vista acatualizar";
});

Route::delete('sucursales/{sucursal}', function ($sucursal){
    return "vista eliminar";
});

Route::get('servidores', function (){
    return "vista sucursal";
});

Route::get('servidores/create', function (){
    return "vista para crear una sucursal";
});

Route::get('servidores/{servidor}', function ($servidor){
    return "vista sucursal: $sucursal";
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