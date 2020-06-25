@extends('layouts.plantilla')

    @section('contenido')

        <h1>Modificación de una marca</h1>

        <div class="alert bg-light border col-8 p-3 mx-auto">
            <form action="/modificarMarca" method="post">
                @csrf
                @method('put')
                Marca: <br>
                <input type="text"
                       value="{{ $marca->mkNombre }}"
                       name="catNombre"
                       class="form-control {{ $errors->has('mkNombre')?'is-invalid':'' }} ">
                @if( $errors->has('mkNombre') )
                    <span class="invalid-feedback">
                        Complete al campo "Marca".
                    </span>
                @endif
                <br>
                <input type="hidden" value="{{ $marca->idMarca }}" name="idCategoria">
                <button class="btn btn-dark mr-3">
                    Modificar marca
                </button>
                <a href="/adminMarcas" class="btn btn-outline-secondary">
                    volver a panel
                </a>
            </form>
        </div>


    @endsection
