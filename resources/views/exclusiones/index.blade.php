@extends('layouts.app')

@section('titulo', 'Gestión Exclusiones')

@section('estilos')
@endsection

<!-- Modal, boton de busqueda-->
@include('layouts.partials.exclusiones.consulta')

@section('encabezado')
<h3 class="editor-toolbar-item">Gestión Exclusiones</h3>

    <div style="position: absolute; right: 2%;">
       
        <button type="button" class="btn btn-secondary" name="buscar" id="buscar"  data-toggle="modal" data-target="#exampleModal">
            <svg class="bi"><use xlink:href="#search"/></svg>
            Buscar abonado
        </button>
        <a href="{{route('exclusiones.create')}}" class="editor-toolbar-item btn btn-secondary">
            <svg class="bi"><use xlink:href="#database-add"/></svg>
            Excluir abonado
        </a>
        <button type="button" class="btn btn-secondary rounded-circle" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left" data-bs-title="Si excluyes una línea..." data-bs-content="
        Esta no se verá afectada por los cambios que realiza la Conciliación en las plataformas. Es importante contar con la solicitud de un coordinador o mayor, y su respectivo ticket.">
            <svg class="bi"><use xlink:href="#question-circle"/></svg>
        </button>
    </div>
@endsection

@section('contenido')
    @include('layouts.partials.messages')
    
    {{$exclusiones->links()}}
    <table class="table">
        <thead>
            <tr>
                <th>Ticket</th>
                <th>Excluido hasta</th>
                <th>Excluido desde</th>
                <th>Responsable</th>
                <th>Abonado</th>
                <th>Observaciones</th>
                <th>Cliente</th>
            </tr>
        </thead>
        <tbody class="table">
            @foreach ($exclusiones as $exclusion)
            <tr>
                <td>{{$exclusion->ticket}}</td>
                <td>{{$exclusion->fechae}}</td>
                <td>{{$exclusion->fechac}}</td>
                <td>{{$exclusion->usuario}}</td>
                <td>{{$exclusion->celular}}</td>
                <td>{{$exclusion->observaciones}}</td>
                <td>{{$exclusion->tcliente}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$exclusiones->links()}}
@endsection