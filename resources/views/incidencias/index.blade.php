@extends('layouts.bootstrap')

@section('titulo', 'Gestion Incidencias y Requerimientos')

@section('estilos')
@endsection

@section('encabezado')
    <h3 class="editor-toolbar-item">Gestion Incidencias</h3>
<div style="position: absolute; right: 2%;">
    <a href="{{route('incidencias.create')}}" class="editor-toolbar-item btn btn-secondary">Cargar Incidencias</a>
</div>
@endsection

@section('contenido')
    @include('layouts.partials.messages')

        <table class="table">
            <thead class="table editor-textarea-editable">
                <tr>
                    <th>#</th>
                    <th>Ticket</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                    <th>Descripcion</th>
                    <th>Solicitante</th>
                </tr>
            </thead>
            <tbody class="table editor-textarea-editable">
                @foreach ($incidencias as $incidencia)
                <tr>
                    <td>{{$incidencia->id}}</td>
                    <td>{{$incidencia->ticket}}</td>
                    <td>{{$incidencia->inicio}}</td>
                    <td>{{$incidencia->fin}}</td>
                    <td>{{$incidencia->descripcion}}</td>
                    <td>{{$incidencia->solicitante}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$incidencias->links()}}
@endsection