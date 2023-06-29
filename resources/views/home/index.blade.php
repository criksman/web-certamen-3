<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vista de Índice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <style>
    html, body {
      height: 100%;
      margin: 0;
    }
    
    .full-height {
      height: 100%;
    }
  </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
    <a class="navbar-brand" href="#">Mi Aplicación</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Subir Foto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Mi Cuenta</a>
        </li>
        <li class="nav-item">
          <a class="@if(Gate::denies('administracion-mostrar')) disabled @endif nav-link" href="{{ route('admin.index') }}">Administración</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('user.logoutUser') }}">Cerrar Sesión</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container-flex bg-success text-white">
    <div class="row">
      <div class="col-sm-12 d-flex align-items-start justify-content-center">
        <div class="jumbotron text-center">
          <h1 class="py-3">Bienvenido a Mi Aplicación</h1>
          <p>Sube tus fotos y compártelas con otros usuarios</p>
          <a href="{{ route('artista.create_imagen') }}" class="btn btn-primary mb-3">Subir Foto</a>
        </div>
      </div>
    </div>

    <div class="row vh-100">
      <div class="col-md-8 offset-md-2 justify-content-center text-center ">
        <h2 class="mb-3">Fotos Subidas</h2>
        <div class="card">
          <div class="card-body bg-info">
          <table class="table table-light table-striped table-striped-columns">
            <thead>
              <tr>
                <th>Titulo</th>
                <th>Baneado</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach($imagenes as $imagen)
              <tr>
                <td> <a href="#">{{ $imagen->titulo }}</a> </td>
                <td> @if($imagen->baneada == 0) No @else Si @endif</td>
                <td>
                  <a href="{{ route('artista.edit_imagen', $imagen->id) }}" class="btn btn-sm btn-primary">Editar</a>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Eliminar
                  </button>
                  <!-- Modal -->
                  <form method="POST" action={{ route('artista.destroyImagen', $imagen->id) }}>
                    @method('delete')
                    @csrf
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmacion</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            ¿Esta seguro de que quiere eliminar esta foto?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Eliminar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-sm btn-danger @if($imagen->baneada == 0) d-none @endif" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                    Motivo de ban
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Motivo de ban</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          {{$imagen->motivo_ban}}
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
              <!-- Agrega más filas según las fotos disponibles -->
            </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>
