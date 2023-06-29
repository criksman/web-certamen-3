<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <style>
  .container-background {
    background-color: #311151; /* Cambia esto al color deseado */
    min-height: 100vh;
    padding: 20px; /* Ajusta el valor de padding según sea necesario */
    }
  
  </style>

  <style>
    .card-background {
    background-color: #accdce; /* Cambia esto al color deseado */
    }
    
  </style>

</head>
<body>
  <div class="container-background">
    <div class="container">
      <div class="row justify-content-center py-5">
        <div class="col-md-6">
          <div class="card card-background">
            <div class="card-header ">
              <h4 class="text-center ">Iniciar sesión</h4>
            </div>
              @if ($errors->any())
              <div class="alert alert-warning">
                  @foreach ($errors->all() as $error)
                  {{ $error }}
                  @endforeach
              </div>
              @endif
            <div class="card-body mb-3">
              <form method="POST" action="{{route('user.authUser')}}">
                @csrf
                <div class="form-group mb-3">
                  <label for="user" class="mb-2">Nombre de usuario:</label>
                  <input type="text" class="form-control" id="user" name="user" placeholder="Ingrese su nombre de usuario">
                </div>
                <div class="form-group mb-4">
                  <label for="password" class="mb-2">Contraseña:</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña">
                </div>
                <div class="text-center ">
                  <button type="submit" class="btn btn-primary fw-bold">Iniciar sesión</button>
                </div>
              </form>
            </div>
            <div class="card-footer">
              <p class="text-center  ">¿No tienes una cuenta? <a href="{{ route('artista.create_user') }}">Regístrate</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>
