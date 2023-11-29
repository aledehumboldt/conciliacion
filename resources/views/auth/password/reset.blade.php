@extends('layouts.app')

@section('titulo', 'Cambio de Contraseña')

@section('encabezado')
    <h3 class="editor-toolbar-item">{{ __('Cambiar Contraseña') }}</h3>
@endsection

@section('contenido')
    @include('layouts.partials.messages')
    <div class="editor-textarea-editable">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            @method('patch')
            <div class="row mb-3">
                <label for="clave" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña actual') }}</label>

                <div class="col-md-6">
                    <input id="clave" type="password" class="form-control @error('clave') is-invalid @enderror" name="clave" value="{{ old('clave') }}" required autocomplete="clave" autofocus>

                    @error('clave')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="nueva-clave" class="col-md-4 col-form-label text-md-end">{{ __('Nueva Contraseña') }}</label>

                <div class="col-md-6">
                    <input id="nueva-clave" type="password" class="form-control @error('nueva-clave') is-invalid @enderror" name="nueva-clave" required autocomplete="new-password">

                    @error('nueva-clave')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="nueva-clave_confirmation" class="col-md-4 col-form-label text-md-end">{{ __('Confirma nueva contraseña') }}</label>

                <div class="col-md-6">
                    <input id="nueva-clave_confirmation" type="password" class="form-control" name="nueva-clave_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-secondary">
                        {{ __('Cambiar contraseña') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
