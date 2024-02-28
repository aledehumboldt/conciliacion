@extends('layouts.app')
@section('titulo', 'Gestión Bypass')

@section('estilos')
@endsection

@section('encabezado')
@include('layouts.partials.bypass.whitelist.modal_editar')
<h3 class="editor-toolbar-item">Gestión Bypass para Lista Blanca</h3>
<div style="position: absolute; right: 2%;">
    @include('layouts.partials.bypass.whitelist.modal_incluir')
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
                @foreach ($bypas_mins as $bypas_min)
                <tr>
                    <td style="display: none">{{$bypas_min->id}}</td>
                    <td>{{$bypas_min->ticket}}</td>
                    <td>{{$bypas_min->fecha}}</td>
                    <td>{{$bypas_min->usuario}}</td>
                    <td>{{$bypas_min->min}}</td>
                    <td>{{$bypas_min->observaciones}}</td>
                    <td>{{$bypas_min->tcliente}}</td>
                    @include('layouts.partials.bypass.whitelist.modal_editar')
                    <td style="display: flex; align-items: center;justify-content: center;">
                    <div style="display: flex; align-items: center;justify-content: center;">
                        <button type="submit" class="btn btn-secondary" type="button" name="editar" id="editar"  data-toggle="modal" data-target="#exampleModal3{{$bypas_min->id}}">
                        <svg class="bi"><use xlink:href="#pencil"/></svg>
                        </button>
                    </div>
                    @include('layouts.partials.bypass.whitelist.modal_excluir')
                    <div style="display: flex; align-items: center;justify-content: center;">
                            <button type="submit" class="btn btn-danger me-md-2" type="button" name="buscar" id="buscar"  data-toggle="modal" data-target="#exampleModal2{{$bypas_min->id}}">
                                <svg class="bi"><use xlink:href="#eraser"/></svg>
                                Excluir
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center pt-1 mb-5 pb-1">
            <a href="{{route('bypassWhitelist.index')}}" class="btn btn-secondary">
                <svg class="bi"><use xlink:href="#caret-left-fill"/></svg>
                Volver
            </a>
        </div>
@endsection