@extends('layouts.app')

@section('titulo', 'Gestión Incidencias')

@section('estilos')

@endsection

@section('encabezado')

    <h3 class="editor-toolbar-item">Gestión Incidencias y Requerimientos</h3>
    <a href="{{route('incidencias.create')}}" class="editor-toolbar-item btn btn-secondary">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-up" viewBox="0 0 16 16">
            <path d="M8.5 11.5a.5.5 0 0 1-1 0V7.707L6.354 8.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 7.707z"/>
            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
        </svg>
        Cargar
    </a>
     
    <a href="{{route('incidencias.export')}}" class="editor-toolbar-item btn btn-secondary">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
        </svg>
        Generar Reporte
    </a>
</div>
@endsection

@section('contenido')
    @include('layouts.partials.messages')
    @include('layouts.partials.incidencias.destroy')
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
            </tr>
        </thead>
        <tbody class="table">
        </tbody>
    </table>
@endsection