@extends('layouts.app')
@section('titulo', 'Gestión Bypass')

@section('estilos')
@endsection

@section('encabezado')
@include('layouts.partials.bypass.imsi.modal_buscar')
<h3 class="editor-toolbar-item">Gestión trafico gris para IMSI</h3>
<div style="position: absolute; right: 2%;">
    <button class="btn btn-secondary me-md-2" type="button" name="buscar" id="buscar"  data-toggle="modal" data-target="#exampleModal">
        <svg class="bi"><use xlink:href="#search"/></svg>
        Consultar
    </button>
        @include('layouts.partials.bypass.imsi.modal_incluir')
        <button type="submit" class="btn btn-secondary" type="button" name="incluir" id="incluir"  data-toggle="modal" data-target="#exampleModal4">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-up" viewBox="0 0 16 16">
                <path d="M8.5 11.5a.5.5 0 0 1-1 0V7.707L6.354 8.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 7.707z"/>
                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
            </svg>
            Incluir IMSI
        </button>
</div>
@endsection

@section('contenido')
    @include('layouts.partials.messages')

    {{$bypas_imsis->links()}}
    <table class="table">
        <thead>
            <tr>
                <th>Ticket</th>
                <th>Fecha</th>
                <th>Usuario</th>
                <th>Imsi</th>
                <th>Observaciones</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody class="table">
            @foreach ($bypas_imsis as $bypas_imsi)
            <tr>
                <td>{{$bypas_imsi->ticket}}</td>
                <td>{{$bypas_imsi->fecha}}</td>
                <td>{{ucwords($bypas_imsi->usuario)}}</td>
                <td>{{$bypas_imsi->imsi}}</td>
                <td>{{$bypas_imsi->observaciones}}</td>
                @include('layouts.partials.bypass.imsi.modal_editar')
                <td>
                    <div style="display: flex; align-items: center;justify-content: center;">
                        <button type="submit" class="btn btn-secondary" type="button" name="editar" id="editar"  data-toggle="modal" data-target="#exampleModal3{{$bypas_imsi->id}}">
                            <svg class="bi"><use xlink:href="#pencil"/></svg>
                        </button>
                        @include('layouts.partials.bypass.imsi.modal_excluir',['imsi' => $bypas_imsi->imsi])
                        <button type="submit" class="btn btn-danger me-md-2" type="button" name="buscar" id="buscar"  data-toggle="modal" data-target="#exampleModal2{{$bypas_imsi->id}}" style="margin-left: 10px">
                            <svg class="bi"><use xlink:href="#eraser"/></svg>
                            Excluir
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$bypas_imsis->links()}}
@endsection