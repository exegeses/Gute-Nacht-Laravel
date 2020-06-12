@extends('layouts.plantilla')
    @section('contenido')
        <h1>Confirmación de baja</h1>

        <div class="card col-4 mx-auto p-0
                    border-danger text-danger">
            <div class="card-header">
                Baja de una región
            </div>
            <div class="card-body">
                {{ $region->regNombre }}
                <form action="/eliminarRegion" method="post">
                    <input type="hidden" value="{{ $region->regID }}" name="regID">
                    <button class="btn btn-danger btn-block my-2">
                        Confirmar baja
                    </button>
                    <a href="/adminRegiones" class="btn btn-outline-secondary btn-block">
                        Volver a panel
                    </a>
                </form>
            </div>
        </div>

        <script>
            Swal.fire(
                'Advertencia',
                'Se eliminará la región seleccionada',
                'error'
            )
        </script>

    @endsection
