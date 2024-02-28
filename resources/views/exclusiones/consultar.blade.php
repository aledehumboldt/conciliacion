@extends('layouts.app')
@section('titulo', 'Exclusiones realizadas')

@section('estilos')
<style>
    form {
        width: 100%;
        display: flex;
        align-items: center !important;
        justify-content: center !important;
    }
    .form-container {
        margin-top: 55px;
        width: 400px;
    }
</style>
@endsection

@section('encabezado')
    <h3 class="">Exclusiones para Abonado</h3>
@endsection

@section('contenido')
    @include('layouts.partials.messages')
    <table class="table">
        <thead>
            <tr>
                <th style="display: none">#</th>
                <th>Ticket</th>
                <th>Excluido hasta</th>
                <th>Excluido desde</th>
                <th>Responsable</th>
                <th>Abonado</th>
                <th>Tecnología</th>
                <th>Cliente</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($exclusiones as $exclusion)
            <tr>
                <td style="display: none">{{$exclusion->id}}</td>
                <td>{{$exclusion->ticket}}</td>
                <td>{{$exclusion->fechae}}</td>
                <td>{{$exclusion->fechac}}</td>
                <td>{{$exclusion->usuario}}</td>
                <td>{{$exclusion->celular}}</td>
                <td>{{$exclusion->tecnologia}}</td>
                <td>{{$exclusion->tcliente}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-center pt-1 mb-5 pb-1">
        <a href="{{route('exclusiones.index')}}" class="btn btn-secondary">
            <svg class="bi"><use xlink:href="#caret-left-fill"/></svg>
            Volver
        </a>
    </div>
@endsection
