@extends('layouts.app')

@section('titulo', 'Pruebas')

@section('estilos')
@endsection

@section('encabezado')

@endsection

@section('contenido')
    @include('layouts.partials.messages')
    <div class="card-body">
        <table class="table table-bordered" id="tableinci">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Ticket</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                    <th>Descripcion</th>
                    <th>Tipo</th>
                    <th>Solicitante</th>
                    <th>Responsable</th>
                    <th style="text-align: center">Acciones</th>
                    @include('layouts.partials.incidencias.destroy')
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection
