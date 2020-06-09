@extends('layouts.plantilla')

@section('contenido')

    <h1>Panel de administración de destinos</h1>

    @if ( session('mensaje') )
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif

    <table class="table table-bordered table-striped table-hover">
        <thead class="thead-dark">
        <tr>
            <th>id</th>
            <th>Destino (aeropuerto)</th>
            <th>Precio</th>
            <th>Región</th>
            <th colspan="2">
                <a href="/formAgregarDestino" class="btn btn-secondary">
                    Agregar
                </a>
            </th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <td>destID</td>
            <td>destNombre</td>
            <td>destPrecio</td>
            <td>regNombre</td>
            <td>
                <a href="/formModificarDestino" class="btn btn-outline-secondary">
                    Modificar
                </a>
            </td>
            <td>
                <a href="/formEliminarDestino" class="btn btn-outline-secondary">
                    Eliminar
                </a>
            </td>
        </tr>

        </tbody>
    </table>

@endsection
