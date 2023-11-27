<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
    <link rel="icon" type="image/x-icon" href="{{asset('assets/1699301436808.png')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <style>
      body {
        width: 100%;
        height: 100vh;
      }
      form {
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .form-container {
        width: 400px;
      }
    </style>

  </head>
  <body>
    <a href="{{url('exclusiones')}}">Inicio</a>
    <a href="{{url('exclusiones/usuarios')}}">Gestionar usuarios</a>
    <a href="{{url('exclusiones/usuarios/create')}}">Registrar usuario</a>

    @if (Session::has('mensaje'))
      {{Session::get('mensaje')}}        
    @endif

    @yield('contenido')
  </body>
</html>