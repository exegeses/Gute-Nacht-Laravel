@extends('layouts.plantilla')

@section('contenido')
    <h1>listado de regiones</h1>

    @foreach( $regiones as $region )
    <div class="alert alert-light col-3 mx-auto">
        {{ $region->regNombre }} - id: {{ $region->regID }}
    </div>
    @endforeach

@endsection
