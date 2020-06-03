@extends('layouts.plantilla')

    @section('contenido')
        <h1>Formulario de envío</h1>

        <div class="alert alert-secondary p-4 col-6 mx-auto">
        <form action="/proceso" method="get">
            Ingrese su nombre: <br>
            <input type="text" name="nombre" class="form-control">
            <br>
            <button class="btn btn-dark btn-block">Enviar</button>
        </form>
        </div>

    @endsection
