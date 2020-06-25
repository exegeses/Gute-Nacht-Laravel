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

## Route::metodo('peticion', 'controlador@accion');

#####################################
####### CRUD Categorias
Route::get('/adminCategorias', 'CategoriaController@index');
Route::get('/agregarCategoria', 'CategoriaController@create');
Route::post('/agregarCategoria', 'CategoriaController@store');
Route::get('/modificarCategoria/{id}', 'CategoriaController@edit');
Route::put('/modificarCategoria', 'CategoriaController@update');
Route::get('/eliminarCategoria/{id}', 'CategoriaController@borrar');
Route::delete('/eliminarCategoria', 'CategoriaController@destroy');
#####################################
####### CRUD Marcas
Route::get('/adminMarcas', 'MarcaController@index');
Route::get('/modificarMarca/{id}', 'MarcaController@edit');
Route::put('/modificarMarca', 'MarcaController@update');

#####################################
####### CRUD Productos
Route::get('/adminProductos','ProductoController@index');
Route::get('/agregarProducto', 'ProductoController@create');
Route::post('/agregarProducto', 'ProductoController@store');


