@extends('layouts.app')

@section('titulo', 'Documentación')

@section('estilos')
<style>
    .titulo {
        width:400px;
        height:40px;
        text-align:center;
        background:#ff585f;
        margin:10px auto;
        border-radius:10px;
        font-weight:bold; 
        box-shadow:inset 0 0 10px 3px #666666;
        border-size:25px;
    }

    .casilla-grande {
        display: table;
        width: 990px;
        margin: auto;
    }

    .casilla {
        float:left;
        width:145px;
        height:100px;
        padding:4px;
        text-align:center;
        background:none repeat scroll 0% 0% #ff585f;
        margin:1% 1%;
        border-radius:10px;
        box-shadow:0 0 10px 3px #666666 inset
    }

    .casilla-texto {
        box-sizing:border-box;
        width:100%;
        overflow:hidden;
    }
</style>
@endsection

@section('encabezado')

<h3 class="editor-toolbar-item">Registro y control de documentos</h3>
<div>
    @include('layouts.partials.documentos.modal_cargar')
        <button type="submit" class="btn btn-secondary" type="button" name="guardar" id="guardar"  data-toggle="modal" data-target="#exampleModal">
            <svg class="bi"><use xlink:href="#file-earmark-arrow-up"/></svg>
        Subir Documento
        </button>
    @include('layouts.partials.documentos.modal_new-cat')
        <button type="submit" class="btn btn-secondary" type="button" name="nuevo" id="nuevo"  data-toggle="modal" data-target="#newcat">
            <svg class="bi"><use xlink:href="#clipboard-plus-fill"/></svg>
            Nueva Categoria
        </button>
</div>
@endsection

@section('contenido')
    @include('layouts.partials.messages')

<div class="">
    @if(isset($archivos) && isset($titles))
        @foreach($titles as $title)
            <h4 class="text-white titulo" style="@if($title == "file.txt") display:none; @endif">
                {{$title}}
            </h4>
            <div class="casilla-grande">
                @foreach($archivos as $archivo)
                    @if ($archivo['title'] == $title)
                        <a class="btn btn-secondary casilla" href="{{$archivo['link']}}" target="_blank">
                            <div class="casilla-texto">
                                {{$archivo['name']}}
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        @endforeach
    @else
        <h3 style="text-transform:uppercase">No hay datos</h3>
    @endif
</div>
@endsection