<?php

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
#Route::metodo('/petición', 'acción');

###################################
##### consulta con raw SQL
Route::get('/regiones', function (){
    $regiones = DB::select('SELECT regID, regNombre FROM regiones');
    return view('regiones', ['regiones'=>$regiones]);
});

################################
##### CRUD de Regiones
Route::get('/adminRegiones', function (){
    return view('adminRegiones');
});
