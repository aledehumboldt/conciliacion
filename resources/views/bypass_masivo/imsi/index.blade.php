@extends('layouts.app')
@section('titulo', 'Gestión Bypass Masivo')

@section('estilos')
@endsection

@section('encabezado')
<h3 class="editor-toolbar-item">Gestionar IMSI en trafico gris masivo</h3>

@endsection

@section('contenido')
    @include('layouts.partials.messages')
    <div style="display: flex; align-items: center;justify-content: center;">
    <form action="{{route('imsiMasivo.import')}}" method="post" enctype="multipart/form-data">
        @csrf
        @if(Session::has('message'))
        <p>{{ Session::get('message') }}</p>
        @endif

        <div style="position: absolute; right: 40%;">
        <input type="file" name="file" class="form-control" required>
        <br>
        <button class="btn btn-secondary" type="submit" name="incluir" id="incluir" value="incluir">
            <svg class="bi"><use xlink:href="#store"/></svg>
            Incluir Masivo
        </button>
        <button class="btn btn-danger" type="submit" name="excluir" id="excluir" value="excluir">
            <svg class="bi"><use xlink:href="#eraser"/></svg>
            Excluir Masivo
        </button>
        </div>
    </form>
    </div>
@endsection