@extends('layouts.app')
@section('titulo', 'Gestión Bypass Masivo')

@section('estilos')
@endsection

@section('encabezado')
<h3 class="editor-toolbar-item">Masivo Abonados trafico gris</h3>

@endsection

@section('contenido')
    @include('layouts.partials.messages')
    <div style="display: flex; align-items: center;justify-content: center;">
    <form action="{{route('minMasivo.import')}}" method="post" enctype="multipart/form-data">
        @csrf
        @if(Session::has('message'))
        <p>{{ Session::get('message') }}</p>
        @endif

        <div style="position: absolute; right: 40%;">
        <input type="file" name="file" class="form-control" required>
        <br>
        <button class="btn btn-secondary" type="submit" name="incluir" id="incluir" value="incluir">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3 19V5C3 3.89543 3.89543 3 5 3H16.1716C16.702 3 17.2107 3.21071 17.5858 3.58579L20.4142 6.41421C20.7893 6.78929 21 7.29799 21 7.82843V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19Z" stroke="currentColor" stroke-width="1.5" />
                <path d="M8.6 9H15.4C15.7314 9 16 8.73137 16 8.4V3.6C16 3.26863 15.7314 3 15.4 3H8.6C8.26863 3 8 3.26863 8 3.6V8.4C8 8.73137 8.26863 9 8.6 9Z" stroke="currentColor" stroke-width="1.5" />
                <path d="M6 13.6V21H18V13.6C18 13.2686 17.7314 13 17.4 13H6.6C6.26863 13 6 13.2686 6 13.6Z" stroke="currentColor" stroke-width="1.5" />
            </svg>
            Incluir Masivo
        </button>
        <button class="btn btn-danger" type="submit" name="excluir" id="excluir" value="excluir">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eraser" viewBox="0 0 16 16">
                <path d="M8.086 2.207a2 2 0 0 1 2.828 0l3.879 3.879a2 2 0 0 1 0 2.828l-5.5 5.5A2 2 0 0 1 7.879 15H5.12a2 2 0 0 1-1.414-.586l-2.5-2.5a2 2 0 0 1 0-2.828l6.879-6.879zm2.121.707a1 1 0 0 0-1.414 0L4.16 7.547l5.293 5.293 4.633-4.633a1 1 0 0 0 0-1.414l-3.879-3.879zM8.746 13.547 3.453 8.254 1.914 9.793a1 1 0 0 0 0 1.414l2.5 2.5a1 1 0 0 0 .707.293H7.88a1 1 0 0 0 .707-.293l.16-.16z"/>
            </svg>
            Excluir Masivo
        </button>
        </div>
    </form>
    </div>
@endsection