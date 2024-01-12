@extends('layouts.bootstrap')

@section('titulo', 'Subir archivo')

@section('estilos')
@endsection

@section('encabezado')

<h3>Subir Archivo</h3>
@endsection

@section('contenido')
    @include('layouts.partials.messages')
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" required>
    <br>
    <br>
    <input type="text" name="name" placeholder="Nombre de archivo" required autocomplete="disabled">
    <br>
    <br>
    <input type="submit" name="Guardar">
</form>

@endsection