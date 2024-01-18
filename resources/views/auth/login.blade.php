<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <title>Aprovisionamiento</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" crossorigin="anonymous">
  <link href="{{asset('css/bootstrap.login.css')}}" rel="stylesheet" crossorigin="anonymous">
  <link href="{{asset('css/stylo.css')}}" rel="stylesheet" crossorigin="anonymous">
  
  <link rel="icon" type="image/x-icon" href="{{asset('assets/1699301436808.png')}}">
</head>

<body style="background-color: #f2f2f2; color:#666666;">

    <section class="h-100 gradient-form" style="background-color: #fd585f;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-5">
              <div class="card rounded-3">
                <div class="row g-0">
                  <div class="col-lg-12">
                    <div class="card-body p-md-2 mx-md-4">
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
            <div class="col-xl-7">
              <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                  <li data-target="#header-carousel" data-slide-to="1"></li>
                  <li data-target="#header-carousel" data-slide-to="2"></li>
                  <li data-target="#header-carousel" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item position-relative active" style="height: 430px;">
                    <img class="position-absolute w-100 h-100" src="{{asset('assets/carousel-1.jpg')}}" style="object-fit: cover;">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                      <div class="p-3" style="max-width: 700px;">
                        <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">¿Nuevo Ingreso?</h1>
                        <p class="mx-md-5 px-5 animate__animated animate__bounceIn text-white">Contacta con el equipo de Aprovisionamiento para la creación de un nuevo usuario.</p>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item position-relative" style="height: 430px;">
                    <img class="position-absolute w-100 h-100" src="{{asset('assets/carousel-2.jpg')}}" style="object-fit: cover;">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                      <div class="p-3" style="max-width: 700px;">
                        <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">¿Olvidaste tu contraseña?</h1>
                        <p class="mx-md-5 px-5 animate__animated animate__bounceIn text-white">Solicita el reestablecimiento de tu clave al equipo de Aprovisionamiento.</p>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item position-relative" style="height: 430px;">
                    <img class="position-absolute w-100 h-100" src="{{asset('assets/carousel-3.jpg')}}" style="object-fit: cover;">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                      <div class="p-3" style="max-width: 700px;">
                        <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Antes de excluir...</h1>
                        <p class="mx-md-5 px-5 animate__animated animate__bounceIn text-white">Verifica si el abonado ya esta excluido hasta la fecha que requieres.</p>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item position-relative" style="height: 430px;">
                    <img class="position-absolute w-100 h-100" src="{{asset('assets/carousel-4.jpg')}}" style="object-fit: cover;">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                      <div class="p-3" style="max-width: 700px;">
                        <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">¿Primera vez?</h1>
                        <p class="mx-md-5 px-5 animate__animated animate__bounceIn text-white">Recuerda que debes ingresar con tu cédula y luego cambiar tu contraseña.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    
  <!-- Bootstrap JavaScript Libraries -->
  <script src="{{asset('js/jquery-3.4.1.min.js')}}" crossorigin="anonymous"></script>
  <script src="{{asset('js/popper.min.js')}}" crossorigin="anonymous"> </script>
  <script src="{{asset('js/bootstrap.min.js')}}" crossorigin="anonymous"></script>
  <script src="{{asset('js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
  <script src="{{asset('js/easing.min.js')}}" crossorigin="anonymous"></script> 
  <script src="{{asset('js/owl.carousel.min.js')}}" crossorigin="anonymous"></script>
  <script src="{{asset('js/jqBootstrapValidation.min.js')}}" crossorigin="anonymous"></script> 
  <script src="{{asset('js/contact.js')}}" crossorigin="anonymous"></script>
  <script src="{{asset('js/color-modes.js')}}" crossorigin="anonymous"></script>
  <script src="{{asset('js/main.js')}}" crossorigin="anonymous"></script>
  <script src="{{asset('js/dashboard.js')}}" crossorigin="anonymous"></script>
</body>

</html>