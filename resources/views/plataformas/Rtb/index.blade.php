@extends('layouts.app')

@section('titulo', 'Plataforma RTB')

@section('estilos')
@endsection

@section('encabezado')

<h3 class="editor-toolbar-item">RTB Prepago PRN</h3>
@endsection

@section('contenido')
    @include('layouts.partials.messages')

    <table id="tablertb" class="table table-bordered">
        <thead>
            <tr>
                <th>MIN</th>
                <th>IMSI</th>
                <th>SIMCARD</th>
                <th>ESTATUS</th>
                <th>FECHAACTIVACION</th>
                <th>PLAN</th>
                <th>NODO</th>
                <th>TIPODISPOSITIVO</th>
            </tr>
        </thead>
    </table>
@endsection