<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <title>Aprovisionamiento</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('assets/estilos.css')}}">
  <link rel="icon" type="image/x-icon" href="{{asset('assets/1699301436808.png')}}">
</head>

<body style="background-color: #f2f2f2; color:#666666;">

    <section class="h-100 gradient-form" style="background-color: #212529;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-5">
              <div class="card rounded-3">
                <div class="row g-0">
                  <div class="col-lg-12">
                    <div class="card-body p-md-5 mx-md-4">
                      <div class="text-center">
                        <img src="{{asset('assets/1699298393389.png')}}"
                          style="width: 185px;" alt="logo">
                        <h4 class="mt-1 mb-5 pb-1">Coordinación de Aprovisionamiento</h4>
                      </div>
      
                      <form method="post" action="{{route('login')}}">
                        @csrf
                        <p>Por favor, inicie sesión.</p>
                        @include('layouts.partials.messages')
                        <div class="form-floating form-outline mb-4">
                          <input type="text" class="form-control" placeholder="Ingrese su cédula" name="usuario" id="usuario"/>
                          <label class="form-label" for="usuario">Usuario</label>
                        </div>
      
                        <div class="form-floating form-outline mb-4">
                          <input type="password" class="form-control" placeholder="Ingrese su contraseña" name="clave" id="password"/>
                          <label class="form-label" for="clave">Contraseña</label>
                        </div>
      
                        <div class="text-center pt-1 mb-5 pb-1">
                          <button class="btn btn-secondary" type="submit">Ingresar</button>
                        </div>      
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    
  <!-- Bootstrap JavaScript Libraries -->
  <script src="{{asset('js/popper.min.js')}}" crossorigin="anonymous">
  </script>

  <script src="{{asset('js/bootstrap.min.js')}}" crossorigin="anonymous">
  </script>
</body>

</html>