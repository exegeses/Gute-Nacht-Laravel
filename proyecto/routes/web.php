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
Route::post('/modificarRegion', function(){
    $regNombre = $_POST['regNombre'];
    $regID = $_POST['regID'];
    /**
    DB::update('UPDATE regiones
                    SET regNombre = '.$regNombre. '
                WHERE regID = '.$regID);
    */
    DB::table('regiones')
        ->where('regID', $regID)
        ->update( [ 'regNombre'=>$regNombre ] );
    return redirect('/adminRegiones')
            ->with('mensaje', 'Región '.$regNombre.' modificada correctamente.');
});

################################
##### CRUD de Destinos usando Query Builder
Route::get('/adminDestinos', function(){
    //obtener datos de los destinos

    /*
    $destinos = DB::select(
                'SELECT
                        destID, destNombre, destPrecio,
                        d.regID, regNombre
                    FROM destinos d, regiones r
                    WHERE d.regID = r.regID'
                );
    */
    $destinos = DB::table('destinos as d')
                    ->join('regiones as r', 'd.regID', '=', 'r.regID')
                    ->get();

    //retornar la vista con los datos
    return view('adminDestinos', [ 'destinos'=>$destinos ]);
});
Route::get('/agregarDestino', function(){
    $regiones = DB::table('regiones')->get();
    return view('formAgregarDestino', [ 'regiones'=>$regiones ] );
});
Route::post('/agregarDestino', function(){
    $destNombre = $_POST['destNombre'];
    DB::table('destinos')
            ->insert(
                [
                    'destNombre' => $_POST['destNombre'],
                    'destPrecio' => $_POST['destPrecio'],
                    'regID' => $_POST['regID'],
                    'destAsientos' => $_POST['destAsientos'],
                    'destDisponibles' => $_POST['destDisponibes']
                ]
            );
    return redirect('/adminDestinos')
                ->with('mensaje', 'Destino: '.$destNombre.' agregado corectamente');
});
Route::get('/modificarDestino/{destID}', function($destID){
    //obtenemos datos del destino por su id
    $destino = DB::table('destinos as d')
                    ->where('destID', $destID)
                    ->join( 'regiones as r', 'd.regID', '=', 'r.regID' )
                    ->first();
    //obtener el listado de regiones para el combo
    $regiones = DB::table('regiones')->get();
    //retornamos vista del form para que muestre los datos cargados
    return view('formModificarDestino',
                [
                    'destino'=>$destino,
                    'regiones'=>$regiones
                ]
    );
});
Route::post('/modificarDestino', function(){
    $destNombre = $_POST['destNombre'];
    $destID = $_POST['destID'];
    DB::table('destinos')
        ->where('destID', $destID)
            ->update(
                [
                    'destNombre' => $_POST['destNombre'],
                    'destPrecio' => $_POST['destPrecio'],
                    'regID' => $_POST['regID'],
                    'destAsientos' => $_POST['destAsientos'],
                    'destDisponibles' => $_POST['destDisponibes']
                ]
            );
    return redirect('/adminDestinos')
        ->with('mensaje', 'Destino: '.$destNombre.' modificado corectamente');
});
