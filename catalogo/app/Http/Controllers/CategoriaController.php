<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //obtenemos listado de categorias
        $categorias = Categoria::paginate(7);

        //retornamos la vista adminCategorias
        return view('adminCategorias', [ 'categorias'=>$categorias ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formAgregarCategoria');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $catNombre = $request->input('catNombre');
        //validación método validate()
        $request->validate(
                        [
                            'catNombre'=>'required|min:2|max:50'
                        ]
                    );

        //guardar en base
        $Categoria = new Categoria;
        $Categoria->catNombre = $catNombre;
        $Categoria->save();

        //redirección + mensaje
        return redirect('/adminCategorias')
                    ->with('mensaje', 'Categoría: '.$catNombre. ' agregada correctamente.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //obtener una categoría filtrada por su id
        $categoria = Categoria::find($id);
        //retornar a la vista del formulario con los datos para modificar
        return view('formModificarCategoria', [ 'categoria'=>$categoria ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $catNombre = $request->input('catNombre');
        //validación
        $request->validate(
                        [
                            'catNombre'=>'required|min:2|max:50'
                        ]
                    );
        //obtener datos de una categoría por su id
        $Categoria = Categoria::find( $request->input('idCategoria') );
        //modificar
        $Categoria->catNombre = $catNombre;
        $Categoria->save();
        //redirección + mensaje
        return redirect('/adminCategorias')
            ->with('mensaje', 'Categoría: '.$catNombre. ' modificada correctamente.');
    }

    /**
     * Confirmación de baja de una categoría
     *
     * @param int id
     * @return \Illuminate\Http\Response
     */
    public function borrar($id)
    {
        //obtener datos de una categoría
        $Categoria = Categoria::find($id);
        //retornar la vista para confirmar
        return view('confirmarBajaCategoría', [ 'categoria'=>$Categoria ] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $Categoria = Categoria::find($request->input('idCategoria'));
        $catNombre = $Categoria->catNombre;
        $Categoria->delete();
        return view('adminCategorias')
                ->with('mensaje', 'Categoría: '.$catNombre.' eliminada correctamente');
    }
}
