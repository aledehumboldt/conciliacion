@extends('layouts.bootstrap')

@section('titulo', 'Almacenamiento Archivos')

@section('estilos')
@endsection

@section('encabezado')

<h3>Registro y control de documentos</h3>
<div style="position: absolute; right: 2%;">
    @include('layouts.partials.documentos.modal_cargar')
        <button type="submit" class="btn btn-secondary" type="button" name="guardar" id="guardar"  data-toggle="modal" data-target="#exampleModal">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-arrow-up" viewBox="0 0 16 16">
            <path d="M8 11a.5.5 0 0 0 .5-.5V6.707l1.146 1.147a.5.5 0 0 0 .708-.708l-2-2a.5.5 0 0 0-.708 0l-2 2a.5.5 0 1 0 .708.708L7.5 6.707V10.5a.5.5 0 0 0 .5.5"/>
            <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1"/>
        </svg>
        Subir Documento
        </button>
</div>
@endsection

@section('contenido')
    @include('layouts.partials.messages')

<div class="grid">
    <div class="">
        @if(isset($archivos) && isset($titles))
            @foreach($titles as $title)
                <h4>{{$title}}</h4>
                    @foreach($archivos as $archivo)
                        @if ($archivo['title'] == $title)
                        <a class="btn btn-secondary" href="{{$archivo['link']}}" target="_blank"><h5 class="text-white" style="text-transform:uppercase">{{$archivo['name']}}</h5></a>
                        @endif
                    @endforeach
            @endforeach
        @else
            <h3 style="text-transform:uppercase">No hay datos</h3>
        @endif
    </div>
</div>
@endsection