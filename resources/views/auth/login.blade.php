<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <title>Aprovisionamiento</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('assets/estilos.css')}}">
  <link rel="icon" type="image/x-icon" href="{{asset('assets/1699301436808.png')}}">
</head>

<body style="background-color: #f2f2f2; color:#666666;">

    <section class="h-100 gradient-form" style="background-color: #ff585f;">
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
      
                      <form method="post" action="/login">
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
                          <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Ingresar</button>
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
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>