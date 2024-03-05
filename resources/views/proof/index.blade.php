@extends('layouts.app')
@section('titulo', 'Gestión Bypass')

@section('estilos')
@endsection

@section('encabezado')
@include('layouts.partials.bypass.min.modal_buscar')
<h3 class="editor-toolbar-item">Gestión trafico gris abonados</h3>
<div>
    <button class="btn btn-secondary me-md-2" type="button" name="buscar" id="buscar"  data-toggle="modal" data-target="#exampleModal">
        <svg class="bi"><use xlink:href="#search"/></svg>
        Consultar
    </button>
        @include('layouts.partials.bypass.min.modal_incluir')
        <button type="submit" class="btn btn-secondary" type="button" name="incluir" id="incluir"  data-toggle="modal" data-target="#exampleModal4">
            <svg class="bi"><use xlink:href="#file-earmark-arrow-up"/></svg>
            Incluir Abonado
        </button>
</div>
@endsection

@section('contenido')
    @include('layouts.partials.messages')
    <table class="table table-bordered" id="tableminbypass">
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