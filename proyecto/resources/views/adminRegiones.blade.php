@extends('layouts.plantilla')
    @section('contenido')
        <h1>Panel de administración de regiones</h1>

        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Región</th>
                    <th colspan="2">
                        <a href="" class="btn btn-dark">
                            Agregar
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#</td>
                    <td>region</td>
                    <td>
                        <a href="" class="btn btn-outline-secondary">
                            Modificar
                        </a>
                    </td>
                    <td>
                        <a href="" class="btn btn-outline-secondary">
                            Eliminar
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>

    @endsection
