@extends('layouts.app')

@section('titulo', 'Gestión Exclusiones')

@section('estilos')
@endsection

@section('encabezado')
    <h3 class="editor-toolbar-item">Gestión Exclusiones</h3>
    <div style="position: absolute; right: 2%;">
        <a href="{{route('exclusiones.create')}}" class="editor-toolbar-item btn btn-secondary">
            <svg class="bi"><use xlink:href="#database-add"/></svg>
            Excluir abonado
        </a>
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