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
 *  ## métodos de RAW SQL
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
Route::get('/agregarRegion', function(){
    return view('formAgregarRegion');
});
Route::post('/agregarRegion', function(){
    $regNombre = $_POST['regNombre'];
   /*
    DB::insert(
            'INSERT INTO regiones
                VALUES ( :regNombre ),
                        [ $regNombre ]'
        );
   */
    DB::table('regiones')->insert( [ 'regNombre'=>$regNombre ] );

    return redirect('/adminRegiones')
           ->with('mensaje', 'Región '.$regNombre.' agregada correctamente');
});
Route::get('/modificarRegion/{regID}', function($regID){
    // obtener datos de la región con el id $regID
   /**
    $region = DB::select('SELECT regID, regNombre
                            FROM regiones
                            WHERE regID = '.$regID
                        );
    */
    $region = DB::table('regiones')
                ->where('regID', $regID)
                ->first();
    //retornar la vista del formulario
    // que debe tener los datos ya cargados
    return view('formModificarRegion', [ 'region'=>$region ]);
});
