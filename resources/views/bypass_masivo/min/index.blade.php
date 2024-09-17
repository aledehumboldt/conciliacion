@extends('layouts.app')
@section('titulo', 'Gestión Bypass Masivo')

@section('estilos')
@endsection

@section('encabezado')
<h3 class="editor-toolbar-item">Gestionar abonados en trafico gris masivo</h3>

@endsection

@section('contenido')
    @include('layouts.partials.messages')
    <div style="display: flex; align-items: center;justify-content: center;">
        @if(Session::has('message'))
        <p>{{ Session::get('message') }}</p>
        @endif
        <form action="{{route('minMasivo.download')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <h2 class="text-secondary">Fromato del archivo</h2>
                <h6 class="text-secondary">El archivo debe ser de extensión .txt</h6>
                <h6 class="text-secondary">El <em>celular</em> debe ir en <b>416</b> / <b>426</b></h6>
                <h6 class="text-secondary"><em>Tipo de Cliente</em> <b>PREPAGO</b> / <b>POSTPAGO</b> (mayúscula)</h6>
                <h6 class="text-secondary"><em>Observaciones</em> o justificacion para la exclusion debe ir entre comillas</h6>
            </div>
            <div class="mb-3">
                <h5 class="text-secondary">Descarga el archivo de prueba, modificalo y vuelve a subirlo</h5>
                <input type="hidden" name="archivo" value="example.txt" id="archivo">
                <button type="submit" class="btn btn-secondary" name="descargar" id="descargar" value="descargar" style="margin-left:40%">
                    <svg class="bi"><use xlink:href="#file-earmark-text"/></svg>
                    Descargar   
                </button>
            </div>
        </form>
    </div>
    <br>
    <div style="display: flex; align-items: center;justify-content: center;">
        <form action="{{route('minMasivo.import')}}" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="file" name="file" class="form-control" required>
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