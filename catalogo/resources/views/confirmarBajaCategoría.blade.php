@extends('layouts.plantilla')

    @section('contenido')

        <h1>Confirmación de baja de una categoría</h1>

        <article class="card col-4 mx-auto p-0
                        text-danger border-danger">
            <div class="card-header">
                Se eliminará la categoría:
            </div>
            <div class="card-body">
                <form action="/eliminarCategoria" method="post">
                @csrf
                @method('delete')
                <span class="display-4">
                    {{ $categoria->catNombre }}
                </span>
                <br>
                <input type="hidden"
                           value="{{ $categoria->idCategoria }}"
                           name="idCategoria">
                    <button class="btn btn-danger btn-block">Confirmar baja</button>

                    <a href="/adminCategorias" class="btn btn-block btn-outline-secondary">
                        volver a panel
                    </a>
                </form>
            </div>
        </article>


    @endsection
