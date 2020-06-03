@extends('layouts.plantilla')

    @section('contenido')
        <h1>Muestreo de dato</h1>

        <div class="alert alert-light col-6 mx-auto">
            Tu nombre es: {{ $nombre }}
        </div>

    @endsection
