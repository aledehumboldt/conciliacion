@extends('layouts.app')

@section('titulo', 'Edición usuario')

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