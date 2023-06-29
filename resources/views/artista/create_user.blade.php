<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de Índice</title>
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
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-6">
        <div class="card card-background">
            <div class="card-body">
            <h5 class="card-title mb-3"><u>Crear cuenta</u></h5>
                @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                    {{ $error }}
                    @endforeach
                </div>
                @endif
            <form method="POST" action="{{ route('artista.storeUser') }}">
                @csrf
                <div class="form-group">
                <label for="user">Nombre de usuario</label>
                <input type="text" class="form-control mb-3" id="user" name="user" placeholder="Ingrese su nombre de usuario">
                </div>

                <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control mb-3" id="password" name="password" placeholder="Ingrese su contraseña">
                </div>

                <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control mb-3" id="nombre" name="nombre" placeholder="Ingrese su nombre ">
                </div>

                <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control mb-3" id="apellido" name="apellido" placeholder="Ingrese su apellido">
                </div>

                <!-- Button trigger modal -->
                <div class="text-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Crear Cuenta
                    </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmación</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ¿Seguro que desea crear un usuario?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Crear Cuenta</button>
                    </div>
                    </div>
                </div>
                </div>

            </form>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>