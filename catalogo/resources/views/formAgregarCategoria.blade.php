@extends('layouts.plantilla')

    @section('contenido')

        <h1>Alta de una nueva categoría</h1>

        <div class="alert bg-light col-8 p-3 mx-auto">
            <form action="/agregarCategoria" method="post">

                Categoría: <br>
                <input type="text" name="catNombre" class="form-control">
                <br>
                <button class="btn btn-dark mr-3">
                    Agregar categoría
                </button>
                <a href="/adminCategorias" class="btn btn-outline-secondary">
                    volver a panel
                </a>
            </form>
        </div>

    @endsection
