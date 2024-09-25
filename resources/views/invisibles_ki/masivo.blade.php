@extends('layouts.app')
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	@section('titulo', 'Gestion Invisibles_Ki')
	

	@section('estilos')
	
	@endsection

	@section('encabezado')
	<h3 class="editor-toolbar-item"> Inclusion/Exclusion Invisibles_Ki</h3>
	
	
    @endsection

	@section('contenido')
	@include('layouts.partials.messages')
    <div style="display: flex; align-items: center;justify-content: center;">
    <form action="{{route('ambosMasivo.import')}}" method="post" enctype="multipart/form-data">
        @csrf
        @if(Session::has('message'))
        <p>{{ Session::get('message') }}</p>
        @endif

        <div style="position: absolute; right: 40%;">
        <input type="file" name="file" class="form-control" required>
        <br>
        <button class="btn btn-secondary" type="submit" name="incluir" id="incluir" value="incluir">
            <svg class="bi"><use xlink:href="#store"/></svg>
            Incluir Masivo
        </button>
        <button class="btn btn-danger" type="submit" name="excluir" id="excluir" value="excluir">
            <svg class="bi"><use xlink:href="#eraser"/></svg>
            Excluir Masivo
        </button>
        </div>
    </form>
    </div>
	
	@endsection