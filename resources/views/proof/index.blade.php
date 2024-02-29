@extends('layouts.app')

@section('titulo', 'Pruebas')

@section('estilos')
@endsection

@section('encabezado')

@endsection

@section('contenido')
    @include('layouts.partials.messages')
    <div class="card-body">
        <table class="table table-bordered" id="tableIncidencia">
            <thead>
                <tr>
                    <th>Ticket</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                    <th>Descripcion</th>
                    <th>Tipo</th>
                    <th>Solicitante</th>
                    <th>Responsable</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection
