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
</head>
<body>
    <div class="container-background">
        <div class="container py-5">
            <div class="card">
                <div class="card-body card-background">
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

                    <form method="POST" action="{{ route('admin.updateUser', $user->user) }}">
                        @method('put')
                        @csrf
                        <h1 class="mb-3"><u>Editar Usuario</u></h1>
                        <div class="form-group mb-2">
                            <label for="user">Nombre de usuario:</label>
                            <input type="text" class="form-control" id="user" name="user" placeholder={{$user->user}}>
                        </div>
                        <div class="form-group mb-2">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder={{$user->nombre}}>
                        </div>
                        <div class="form-group mb-2">
                            <label for="apellido">Apellido:</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder={{$user->apellido}}>
                        </div>
                        <div class="form-group mb-2">
                            <label for="perfil_id">Rol:</label>
                            <select class="form-control" id="perfil_id" name="perfil_id">
                            <option value="2" @if($user->perfil->id == 2) selected @endif >Usuario</option>
                            <option value="1" @if($user->perfil->id == 1) selected @endif >Administrador</option>
                            </select>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary">Cancelar</button>
                            <button type="submit" class="btn btn-primary mr-2">Subir</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
