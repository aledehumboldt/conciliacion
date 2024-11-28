@extends('layouts.app')
@section('titulo', 'Plataforma RTB')

@section('estilos')
@endsection

@section('encabezado')
<h3 class="editor-toolbar-item">Opciones para Gestionar</h3>
@endsection

@section('contenido')
    @include('layouts.partials.messages')
        <button class="boton-caja">Suscriptores Suspendidos</button>
        <div>
            <button class="btn btn-primary" type="submit">Generar Consulta</button>
        </div>
@endsection