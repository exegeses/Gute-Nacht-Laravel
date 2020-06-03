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
Route::get('/saludo', function (){
    $nombre = 'Marcos';
    $numero = 3;
    return view('saludo',
            [
                'nombre' => $nombre,
                'numero' => $numero
            ] );
});

Route::view('/test', 'vista');

##retornar vista de un formulario
Route::view('/form', 'formulario');
// procesar dato desde el form
Route::get('/proceso', function(){
    //capturar dato desde el form
    $nombre = $_GET['nombre'];

    //retornar la vista que mostrar ese dato
    return view('proceso', [ 'nombre'=>$nombre ] );
});
