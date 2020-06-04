@extends('layouts.plantilla')
    @section('contenido')
        <h1>Alta de una región</h1>

        <div class="alert bg-light p-3 col-8 mx-auto">
            <form action="/agregarRegion" method="post">
                Region: <br>
                <input type="text" name="regNombre" class="form-control">
                <br>
                <button class="btn btn-dark">Agregar región</button>
                <a href="/adminRegiones" class="btn btn-outline-secondary">
                    volver a panel
                </a>
            </form>
        </div>

    @endsection
