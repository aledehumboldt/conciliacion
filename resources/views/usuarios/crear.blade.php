@extends('layouts.app')

@section('titulo', 'Creación usuario')

@section('estilos')
    <style>
        form {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .form-container {
            width: 400px;
        }
    </style>
@endsection

@section('encabezado')
    <h3 class="editor-toolbar-item">Creación de nuevo usuario</h3>
@endsection

@section('contenido')
@include('layouts.partials.messages')
    <div class="editor-textarea-editable">
        <form action="{{route('usuarios.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @include('layouts.form',['mod'=>'Crear'])
        </form>
    </div>
@endsection
