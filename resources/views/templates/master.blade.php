<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vista de Índice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<div class="row">
    <div class="col">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand p-2" href="#">Certamen Nº2</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route('publico.index')}}">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="@if(Gate::allows('invitado-mostrar')) disabled @else enabled @endif nav-link" href="{{route('home.index')}}">Publicar</a>
            </li>
            <li class="nav-item">
                <a class="@if(Gate::allows('administracion-mostrar')) enabled @else disabled @endif nav-link" href="{{ route('admin.index') }}">Administración</a>
            </li>
            <li class="nav-item">
                @if(Gate::allows('invitado-mostrar'))
                <form method="POST" action="{{ route('publico.DestroyLogoutUser') }}">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-primary">Salir</button>
                </form>
                @else
                <a class="nav-link" href="{{ route('user.logoutUser') }}">Cerrar Sesión</a>
                @endif
            </li>
            </ul>
        </div>
        </nav>
    </div>
</div>

<div class="container vh-100">
    @yield('main-content')
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>