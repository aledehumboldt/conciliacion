@extends('layouts.app')
@section('titulo', 'Gestión Bypass')

@section('estilos')
@endsection

@section('encabezado')
<h3 class="editor-toolbar-item">Gestión trafico gris abonados</h3>
<div>
        @include('layouts.partials.proof.incluir')
        <button type="submit" class="btn btn-secondary" type="button" name="incluir" id="incluir"  data-toggle="modal" data-target="#formularioModal">
            <svg class="bi"><use xlink:href="#file-earmark-arrow-up"/></svg>
            Incluir Abonado
        </button>
</div>
@endsection

@section('contenido')
    @include('layouts.partials.messages')
    <table class="table table-bordered tableminbypass">
        <thead>
            <tr>
                <th>#</th>
                <th>Ticket</th>
                <th>Fecha</th>
                <th>Usuario</th>
                <th>Número</th>
                <th>Observaciones</th>
                <th>Tipo de cliente</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection