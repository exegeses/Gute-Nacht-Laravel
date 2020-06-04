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

/**
 *   DB::select();
 *   DB::insert();
 *   DB::update();
 *   DB::delete();
 */

################################
##### CRUD de Regiones usando Query Builder
Route::get('/adminRegiones', function (){
    //$regiones = DB::select('SELECT regID, regNombre FROM regiones');
    $regiones = DB::table('regiones')->get();
    return view('adminRegiones', [ 'regiones'=>$regiones ] );
});

