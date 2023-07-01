<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
    body{
      background-color: #311151;
    }
  </style>
</head>
<body>
  <div class="row">
    <div class="col d-flex align-items-center justify-content-center mt-5">
      <div class="card d-flex flex-column ">
        <div class="card-header">
          <h4 class="text-center">Iniciar sesión</h4>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
        <p>Por favor solucione los siguientes problemas:</p>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
        @endif
        <div class="card-body">
          <form method="POST" action="{{route('user.authUser')}}">
            @csrf
            <div class="form-group mt-3">
              <label for="user">Nombre de usuario:</label>
              <input type="text" class="form-control" id="user" name="user" placeholder="Nombre de usuario">
            </div>
            <div class="form-group mt-3">
              <label for="password">Contraseña:</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary mt-3">Iniciar sesión</button>
            </div>
          </form>
        </div>
        <div class="card-footer">
          <p class="text-center">¿Eres un artista? <a href="{{ route('artista.create_user') }}">Regístrate</a></p>
          <form method="POST" action="{{ route('publico.StoreLoginUser') }}">
            @csrf
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Ingresar como invitado</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>
