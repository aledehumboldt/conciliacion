<!doctype html>
<html lang="en">

<head>
  <title>Aprovisionamiento</title>
  <!-- Required meta tags -->
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
            <div class="col-xl-7">
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
                        <p>Por favor, regístrese.</p>
      
                        <div class="form-outline mb-4">
                            <label class="form-label" for="name">Nombre</label>
                            <input type="text" class="form-control"
                              placeholder="Ingrese su nombre" name="name" id="name"/>
                          </div>

                          <div class="form-outline mb-4">
                          <label class="form-label" for="usuario">Usuario</label>
                          <input type="text" class="form-control"
                            placeholder="Ingrese su cédula" name="usuario" id="usuario"/>
                        </div>
      
                        <div class="form-outline mb-4">
                          <label class="form-label" for="password">Clave</label>
                          <input type="password" class="form-control" name="password" id="password"/>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="password-confirm">Confirmar Clave</label>
                            <input type="password" class="form-control" name="password-confirm" id="password-confirm"/>
                        </div>
      
                        <div class="text-center pt-1 mb-5 pb-1">
                          <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Registrar</button>
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