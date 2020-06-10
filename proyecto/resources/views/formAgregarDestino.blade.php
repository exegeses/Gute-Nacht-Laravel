@extends('layouts.plantilla')
    @section('contenido')

        <h1>Alta de un nuevo destino</h1>

        <form action="/agregarDestino" method="post">
            @csrf

            Nombre: <br>
            <input type="text" name="destNombre" class="form-control" required>
            <br>
            Región: <br>
            <select name="regID" class="form-control" required>
                <option value="">Seleccione una Región</option>
            </select>
            <br>
            Precio: <br>
            <input type="number" name="destPrecio" class="form-control" required>
            <br>
            Asientos Totales: <br>
            <input type="number" name="destAsientos" class="form-control" required>
            <br>
            Asientos Disponibles: <br>
            <input type="number" name="destDisponibles" class="form-control" required>
            <br>

            <br>
            <input type="submit" value="Agregar destino" class="btn btn-dark">
        </form>

    @endsection

