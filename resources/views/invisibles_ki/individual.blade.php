@extends('layouts.app')
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	@section('titulo', 'Gestion Invisibles_Ki')
	

	@section('estilos')
	
	@endsection

	@section('encabezado')
	<h3 class="editor-toolbar-item"> Inclusion/Exclusion Invisibles_Ki</h3>
    <div style="position: absolute; right: 2%;">
        <button class="btn btn-secondary me-md-2" type="button" name="buscar" id="buscar"  data-toggle="modal" data-target="#exampleModal">
            <svg class="bi"><use xlink:href="#search"/></svg>
            Consultar
        </button>
            
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
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Ticket</th>
            <th>IMSI</th>
            <th>Fecha</th>
            <th>Observaciones</th>
            <th style="text-align: center">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($imsi_kis as $imsi_ki)
            <tr>
                <td>{{$imsi_ki->id}}</td>
                <td>{{ $imsi_ki->ticket }}</td>
                <td>{{ $imsi_ki->imsi }}</td>
                <td>{{ $imsi_ki->fecha }}</td>
                <td>{{ $imsi_ki->observaciones }}</td>

                
                <td>
                    <div style="display: flex; align-items: center;justify-content: center;">
                    <a href="{{route('imsi_ki.edit',$imsi_ki->id)}}">
                        <button class="btn btn-secondary" title="Editar">
                            <svg class="bi"><use xlink:href="#pencil"/></svg>
                        </button>
                    </a>
                    <form action="{{route('imsi_ki.destroy',$imsi_ki->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button style="margin-left: 10px" type="submit" onclick="return confirm('¿Seguro desea suspender el usuario?')" value="Suspender" class="btn btn-danger" title="Excluir">
                            <svg class="bi"><use xlink:href="#eraser"/></svg>
                        </button>
                    </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection