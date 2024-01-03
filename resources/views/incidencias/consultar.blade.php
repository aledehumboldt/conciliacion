@extends('layouts.bootstrap')
@section('titulo', 'incidencias realizadas')

@section('estilos')
<style>
    form {
        width: 100%;
        display: flex;
        align-items: center !important;
        justify-content: center !important;
    }
    .form-container {
        margin-top: 55px;
        width: 400px;
    }
</style>
@endsection

@section('encabezado')
    <h3 class="">Incidencias</h3>
@endsection

@section('contenido')
    @include('layouts.partials.messages')
    <table class="table">
        <thead class="table">
            <tr>
                <th style="display: none">#</th>
                <th>Ticket</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Descripcion</th>
                <th>Solicitante</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($incidencias as $incidencia)
            <tr>
                <td style="display: none">{{$incidencia->id}}</td>
                    <td>{{$incidencia->ticket}}</td>
                    <td>{{$incidencia->inicio}}</td>
                    <td>{{$incidencia->fin}}</td>
                    <td>{{$incidencia->descripcion}}</td>
                    <td>{{$incidencia->solicitante}}</td>
                    
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-center pt-1 mb-5 pb-1">
        <a href="{{route('incidencias.index')}}" class="btn btn-secondary">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 14 14">
                <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
            </svg>
            Volver
        </a>
    </div>
@endsection
