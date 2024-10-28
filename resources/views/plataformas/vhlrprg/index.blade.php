@extends('layouts.app')

@section('titulo', 'Gestión Incidencias')

@section('estilos')

@endsection

@section('encabezado')
    <h3 class="editor-toolbar-item">VHLR PREPAGO</h3>
@endsection

@section('contenido')

    <table class="table table-bordered" id="vhlrprg">
        <thead>
            <tr>
                <th>MSISDN</th>
                <th>IMSI</th>
                <th>CAT</th>
                <th>CURRENTNAM</th>
                <th>LOCK</th>
                <th>ODBIC</th>
                <th>TBS</th>
                <th>ODBOC</th>
                <th>ODBROAM</th>
                <th>OCSI</th>
                <th>TCSI</th>
                <th>GRPSCSI</th>
                <th>EPSPROFILEID</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection