@extends('layouts.bootstrap')

@section('titulo', 'Edición usuarios')

@section('estilos')
    <style>
        form {
            width: 100%;
            height: 70vh;
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
    <h3 class="editor-toolbar-item">Edición de usuario</h3>
@endsection

@section('contenido')
    @include('layouts.partials.messages')
    <form action="{{route('usuarios.update',$usuario->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        @include('layouts.form',['mod'=>'Actualizar'])
    </form>
@endsection