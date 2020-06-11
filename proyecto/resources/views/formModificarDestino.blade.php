@extends('layouts.plantilla')
    @section('contenido')

        <h1>Modificación de un destino</h1>

        <div class="alert bg-light p-3 col-8 mx-auto">
        <form action="/modificarDestino" method="post">
            @csrf

            Nombre: <br>
            <input type="text" value="{{ $destino->destNombre }}" name="destNombre" class="form-control" required>
            <br>
            Región: <br>
            <select name="regID" class="form-control" required>
                <option value="{{ $destino->regID }}">{{ $destino->regNombre }}</option>
        @foreach( $regiones as $region )
                <option value="{{ $region->regID }}">{{ $region->regNombre }}</option>
        @endforeach
            </select>
            <br>
            Precio: <br>
            <input type="number" value="{{ $destino->destPrecio }}" name="destPrecio" class="form-control" required>
            <br>
            Asientos Totales: <br>
            <input type="number" value="{{ $destino->destAsientos }}" name="destAsientos" class="form-control" required>
            <br>
            Asientos Disponibles: <br>
            <input type="number" value="{{ $destino->destDisponibles }}" name="destDisponibles" class="form-control" required>
            <br>

            <br>
            <input type="submit" value="Modificar destino" class="btn btn-dark">
            <a href="/adminDestinos" class="btn btn-outline-secondary">
                volver a panel
            </a>
        </form>
        </div>
    @endsection

