<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Usuarios</title>
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

    <style>
    .table-bordered {
    table-bordered: #6cc9df;
    }

    </style>
</head>
<body>
  <div class="container-background">
    <div class="container mt-5">
      <div class="card card-background">
        <div class="card-body">
          <h1 class="mb-3"><u>Lista de Usuarios</u></h1>
          <div class="mb-3">
            <a href="{{ route('admin.create_user') }}" class="btn btn-primary">Agregar Usuario</a>
          </div>
          <table class="table table-bordered border-secondary table-hover">
            <thead>
              <tr>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Tipo de cuenta</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              <tr>
              <td>{{$user->user}}</td>
              <td>{{$user->nombre}}</td>
              <td>{{$user->apellido}}</td>
              <td>@if ($user->perfil->nombre == 'Administrador') Administrador @else Normal @endif</td>
              <td>
                  <a href="{{ route('admin.edit_user', $user->user) }}" class="btn btn-sm btn-primary mb-2">Editar</a>
                  <form method="POST" action="{{ route('admin.deleteUser', $user->user) }}">
                      @method('delete')
                      @csrf
                      <button @if($user->user == Auth::user()->user) disabled @endif type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#borrarCuenta" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Borrar</button>
                  </form>
                  <!---modal--->
                  <div class="modal fade" id="borrarCuenta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Borrar Cuenta</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          ¿Estas seguro de borrar esta cuenta? Si la borra, este usuario no podra volver a acceder
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                          <button type="button" class="btn btn-primary">Borrar Cuenta</button>
                        </div>
                      </div>
                    </div>
                  </div>
              </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <button type="submit" class="btn btn-warning">
            Volver
          </button>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>
