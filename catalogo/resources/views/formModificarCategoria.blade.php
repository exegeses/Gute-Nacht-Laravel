@extends('layouts.plantilla')

    @section('contenido')

        <h1>Modificación de una categoría</h1>

        <div class="alert bg-light border col-8 p-3 mx-auto">
            <form action="/modificarCategoria" method="post">
                @csrf
                Categoría: <br>
                <input type="text" name="catNombre" class="form-control">

                <br>
                <button class="btn btn-dark mr-3">
                    Modificar categoría
                </button>
                <a href="/adminCategorias" class="btn btn-outline-secondary">
                    volver a panel
                </a>
            </form>
        </div>

    @endsection
