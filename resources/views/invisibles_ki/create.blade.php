@extends('layouts.app')


@section('titulo', 'Incluir IMSI')


@section('estilos')
<style>
  form {
      width: 100%;
      display: flex;
      align-items: center !important;
      justify-content: center !important;
  }
  .form-container {
      margin-top: 30px;
      width: 400px;
  }
  </style>
  @endsection


@section('encabezado')
  <h3 class="editor-toolbar-item">Inclusion IMSI</h3>
@endsection


@section('contenido')
  @include('layouts.partials.messages')


  <form action="{{ route('invisibles_ki.store') }}" method="POST">
    @csrf

  <div class="form-container">


    <div class="form-group">
      <label for="ticket">Ticket:</label>
      <input type="text" class="form-control @error('ticket') is-invalid @enderror" id="ticket" name="ticket" value="{{ old('ticket') }}" required autofocus>
      @error('ticket')


        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>


    <div class="form-group">
      <label for="imsi">IMSI:</label>
      <input type="text" class="form-control @error('imsi') is-invalid @enderror" id="imsi" name="imsi" value="{{ old('imsi') }}" required>
      @error('imsi')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>


    <div class="form-group">
      <label for="fecha">Fecha:</label>
      <input type="date" class="form-control @error('fecha') is-invalid @enderror" id="fecha" name="fecha" value="{{ old('fecha') }}" required>
      @error('fecha')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>


    <div class="form-group">
      <label for="observaciones">Observaciones:</label>
      <textarea class="form-control @error('observaciones') is-invalid @enderror" id="observaciones" name="observaciones" rows="3">{{ old('observaciones') }}</textarea>
         @error('observaciones')
           <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
            </span>
         @enderror
         
    </div>
        
    <button type="submit" name="agregar" id="guardar" class="btn btn-secondary">
      <svg class="bi"><use xlink:href="#store"/></svg>
      Guardar IMSI
    </button>
        
        <a href="{{route('invisibles_ki.individual')}}" class="btn btn-secondary">
          <svg class="bi"><use xlink:href="#caret-left-fill"/></svg>  
          Volver
      </a>
    </form>
@endsection
