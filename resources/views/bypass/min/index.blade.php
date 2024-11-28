@extends('layouts.app')
@section('titulo', 'Gestión Bypass')

@section('estilos')
@endsection

@section('encabezado')
@include('layouts.partials.bypass.min.modal_buscar')
<h3 class="editor-toolbar-item">Gestión trafico gris abonados</h3>
<div>
    <button class="btn btn-secondary me-md-2" type="button" name="buscar" id="buscar"  data-toggle="modal" data-target="#exampleModal">
        <svg class="bi"><use xlink:href="#search"/></svg>
        Consultar
    </button>
        @include('layouts.partials.bypass.min.modal_incluir')
        <button type="submit" class="btn btn-secondary" type="button" name="incluir" id="incluir"  data-toggle="modal" data-target="#exampleModal4">
            <svg class="bi"><use xlink:href="#file-earmark-arrow-up"/></svg>
            Incluir Abonado
        </button>
</div>
@endsection

@section('contenido')
    @include('layouts.partials.messages')
    {{$bypas_mins->links()}}
    <table class="table">
        <thead>
            <tr>
                <th>Ticket</th>
                <th>Fecha</th>
                <th>Usuario</th>
                <th>Número</th>
                <th>Observaciones</th>
                <th>Tipo de cliente</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody class="table">
            @foreach ($bypas_mins as $bypas_min)
            <tr>
                <td>{{$bypas_min->ticket}}</td>
                <td>{{$bypas_min->fecha}}</td>
                <td>{{ucwords($bypas_min->usuario)}}</td>
                <td>{{$bypas_min->min}}</td>
                <td>{{$bypas_min->observaciones}}</td>
                <td>{{$bypas_min->tcliente}}</td>
                <td>
                    <div style="display: flex; align-items: center;justify-content: center;">                        
                    @include('layouts.partials.bypass.min.modal_editar')
                        <button type="submit" class="btn btn-secondary" type="button" name="editar" id="editar"  data-toggle="modal" data-target="#exampleModal3{{$bypas_min->id}}">
                        <svg class="bi"><use xlink:href="#pencil"/></svg>
                        </button>
                        @include('layouts.partials.bypass.min.modal_excluir',['numero' => $bypas_min->min])
                        <button type="submit" class="btn btn-danger me-md-2" style="margin-left: 15px" type="button" name="buscar" id="buscar"  data-toggle="modal" data-target="#exampleModal2{{$bypas_min->id}}">
                            <svg class="bi"><use xlink:href="#eraser"/></svg>
                            Excluir
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$bypas_mins->links()}}
@endsection