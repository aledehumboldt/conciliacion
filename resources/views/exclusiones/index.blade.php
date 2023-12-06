@extends('layouts.bootstrap')

@section('titulo', 'Gestion Exclusiones')

@section('estilos')
@endsection

@section('encabezado')
    <h3 class="editor-toolbar-item">Gestion Exclusiones</h3>
<div style="position: absolute; right: 2%;">
    <a href="{{route('exclusiones.create')}}" class="editor-toolbar-item btn btn-secondary">Excluir abonado</a>
</div>
@endsection

@section('contenido')
    @include('layouts.partials.messages')

        <table class="table">
            <thead class="table editor-textarea-editable">
                <tr>
                    <th>#</th>
                    <th>Ticket</th>
                    <th>Excluido hasta</th>
                    <th>Excluido desde</th>
                    <th>Responsable</th>
                    <th>Abonado</th>
                    <th>Observaciones</th>
                    <th>Tipo cliente</th>
                </tr>
            </thead>
            <tbody class="table editor-textarea-editable">
                @foreach ($exclusiones as $exclusion)
                <tr>
                    <td>{{$exclusion->id}}</td>
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