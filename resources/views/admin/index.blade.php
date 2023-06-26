<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Usuarios</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

  <div class="container mt-5">
    <h1>Lista de Usuarios</h1>
    <div class="text-right mb-3">
      <a href="{{ route('admin.create_user') }}" class="btn btn-primary">Agregar Usuario</a>
    </div>
    <table class="table">
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
            <a href="{{ route('admin.edit_user', $user->user) }}" class="btn btn-sm btn-primary">Editar</a>
            <form method="POST" action="{{ route('admin.deleteUser', $user->user) }}">
                @method('delete')
                @csrf
                <button @if($user->user == Auth::user()->user) disabled @endif type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Borrar</button>
            </form>
        </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>
