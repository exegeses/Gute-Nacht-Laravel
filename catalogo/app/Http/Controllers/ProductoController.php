<?php

namespace App\Http\Controllers;

use App\Marca;
use App\Categoria;
use App\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // llamamos a las relaciones con with()
        $productos = Producto::with('relMarca', 'relCategoria' )->paginate(8);
        return view('adminProductos', [ 'productos'=>$productos ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //obtener listados de marcas y categorías
        $marcas = Marca::all();
        $categorias = Categoria::all();

        return view('formAgregarProducto',
            [
                'marcas'=>$marcas,
                'categorias'=>$categorias
            ]
        );
    }

    public function subirImagen(Request $request)
    {
        //si no enviaron archivo en AGREGAR
        $prdImagen = 'noDisponible.jpg';

        //si no enviaron nada en MODIFICAR
        if( $request->has('imagenActual') ){
            $prdImagen = $request->input('imagenActual');
        }

        //si enviaron archivo
        if( $request->file('prdImagen') ){
            //renombrar archivo
                # time().extension
            $prdImagen = time().'.'.$request->file('prdImagen')->clientExtension();
            //subir al server move()
            $request->file('prdImagen')
                        ->move( public_path('productos/'), $prdImagen );
        }

        return $prdImagen;
    }

    public function validar(Request $request)
    {
        $request->validate(
            [
                'prdNombre'=>'required|min:3|max:70',
                'prdPrecio'=>'required|numeric|min:0',
                'prdPresentacion'=>'required|min:3|max:150',
                'prdStock'=>'required|integer|min:1',
                'prdImagen'=>'mimes:jpg,jpeg,png,gif,svg,webp|max:2048'
            ],
            [
                'prdNombre.required'=>'Complete el campo Nombre',
                'prdNombre.min'=>'Complete el campo Nombre con al menos 3 caractéres',
                'prdNombre.max'=>'Complete el campo Nombre con 70 caractéres como máxino',
                'prdPrecio.required'=>'Complete el campo Precio',
                'prdPrecio.numeric'=>'Complete el campo Precio con un número',
                'prdPrecio.min'=>'Complete el campo Precio con un número positivo',
                'prdPresentacion.required'=>'Complete el campo Presentación',
                'prdPresentacion.min'=>'Complete el campo Presentación con al menos 3 caractéres',
                'prdPresentacion.max'=>'Complete el campo Presentación con 150 caractérescomo máxino',
                'prdStock.required'=>'Complete el campo Stock',
                'prdStock.integer'=>'Complete el campo Stock con un número entero',
                'prdStock.min'=>'Complete el campo Stock con un número positivo',
                'prdImagen.mimes'=>'Debe ser una imagen',
                'prdImagen.max'=>'Debe ser una imagen de 2MB como máximo'
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validacion
        $this->validar($request);
        //subir imagen (*)
        $prdImagen = $this->subirImagen( $request );
        //instanciar
        $Producto = new Producto;
        $Producto->prdNombre = $request->input('prdNombre');
        $Producto->prdPrecio = $request->input('prdPrecio');
        $Producto->idMarca = $request->input('idMarca');
        $Producto->idCategoria = $request->input('idCategoria');
        $Producto->prdPresentacion = $request->input('prdPresentacion');
        $Producto->prdStock = $request->input('prdStock');
        $Producto->prdImagen = $prdImagen;
        //guardar
        $Producto->save();
        //redirigir con mensaje de ok
        return redirect('/adminProductos')
                    ->with('mensaje', 'Producto: '.$request->input('prdNombre').' agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //obtener datos del Producto
        $Producto = Producto::with('relMarca', 'relCategoria')->find($id);
        // obtener datos de Marcas y Categorías
        $marcas = Marca::all();
        $categorias = Categoria::all();
        //retorna la vista para modificar con datos del Producto
        return view('formModificarProducto',
                    [
                        'producto'=>$Producto,
                        'marcas'=>$marcas,
                        'categorias'=>$categorias
                    ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //validacion
        $this->validar($request);

        //obtener datos de un producto
        $Producto = Producto::find( $request->input('idProducto') );
        //asignar valores
        $Producto->prdNombre = $request->input('prdNombre');
        $Producto->prdPrecio = $request->input('prdPrecio');
        $Producto->idMarca = $request->input('idMarca');
        $Producto->idCategoria = $request->input('idCategoria');
        $Producto->prdPresentacion = $request->input('prdPresentacion');
        $Producto->prdStock = $request->input('prdStock');
            # subir imagen *
        $Producto->prdImagen = $this->subirImagen($request);
        //grabar
        $Producto->save();
        //redirigir con mensaje de ok
        return redirect('/adminProductos')
                ->with('mensaje', 'Producto: '.$request->input('prdNombre').' modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
