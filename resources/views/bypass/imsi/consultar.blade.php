@extends('layouts.app')
@section('titulo', 'Gestión bypass')

@section('estilos')
@endsection

@section('encabezado')
<h3 class="editor-toolbar-item">Gestión trafico gris para IMSI</h3>
<div style="position: absolute; right: 2%;">
    @include('layouts.partials.bypass.imsi.modal_incluir')
    <button type="submit" class="btn btn-secondary" type="button" name="incluir" id="incluir"  data-toggle="modal" data-target="#exampleModal4">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-up" viewBox="0 0 16 16">
            <path d="M8.5 11.5a.5.5 0 0 1-1 0V7.707L6.354 8.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 7.707z"/>
            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
        </svg>
        Incluir Abonado
    </button>
</div>
@endsection

@section('contenido')
    @include('layouts.partials.messages')
        <table class="table">
            <thead>
                <tr>
                    <th style="display: none">#</th>
                    <th>Ticket</th>
                    <th>Fecha</th>
                    <th>Usuario</th>
                    <th>Min</th>
                    <th>Observaciones</th>
                    <th>Tipo de cliente</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table">
                @foreach ($bypas_imsis as $bypas_imsi)
                <tr>
                    <td style="display: none">{{$bypas_imsi->id}}</td>
                    <td>{{$bypas_imsi->ticket}}</td>
                    <td>{{$bypas_imsi->fecha}}</td>
                    <td>{{$bypas_imsi->usuario}}</td>
                    <td>{{$bypas_imsi->min}}</td>
                    <td>{{$bypas_imsi->observaciones}}</td>
                    <td>{{$bypas_imsi->tcliente}}</td>
                    @include('layouts.partials.bypass.imsi.modal_editar')
                    <td style="display: flex; align-items: center;justify-content: center;">
                    <div style="display: flex; align-items: center;justify-content: center;">
                        <button type="submit" class="btn btn-secondary" type="button" name="editar" id="editar"  data-toggle="modal" data-target="#exampleModal3{{$bypas_imsi->id}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                          </svg>
                        </button>
                    </div>
                    @include('layouts.partials.bypass.imsi.modal_excluir')
                    <div style="display: flex; align-items: center;justify-content: center;">
                            <button type="submit" class="btn btn-danger me-md-2" type="button" name="buscar" id="buscar"  data-toggle="modal" data-target="#exampleModal2{{$bypas_imsi->id}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eraser" viewBox="0 0 16 16">
                                    <path d="M8.086 2.207a2 2 0 0 1 2.828 0l3.879 3.879a2 2 0 0 1 0 2.828l-5.5 5.5A2 2 0 0 1 7.879 15H5.12a2 2 0 0 1-1.414-.586l-2.5-2.5a2 2 0 0 1 0-2.828l6.879-6.879zm2.121.707a1 1 0 0 0-1.414 0L4.16 7.547l5.293 5.293 4.633-4.633a1 1 0 0 0 0-1.414l-3.879-3.879zM8.746 13.547 3.453 8.254 1.914 9.793a1 1 0 0 0 0 1.414l2.5 2.5a1 1 0 0 0 .707.293H7.88a1 1 0 0 0 .707-.293l.16-.16z"/>
                                </svg>
                                Excluir
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center pt-1 mb-5 pb-1">
            <a href="{{route('bypassImsi.index')}}" class="btn btn-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 14 14">
                    <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                </svg>
                Volver
            </a>
        </div>
@endsection