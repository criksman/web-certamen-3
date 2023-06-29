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
        <div class="container mt-5">
            <div class="card card-background">
                <div class="card-body ">
                    <div class="row ">
                        <div class="col-md-8 offset-md-2">
                        <h2 class="mb-3"><u>Subir Imagen</u></h2>
                        @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                            {{ $error }}
                            @endforeach
                        </div>
                        @endif
                        <form method="POST" action="{{ route('artista.storeImagen') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="titulo" class="mb-2">Título</label>
                                <input type="text" class="form-control mb-2" id="titulo" name="titulo">
                            </div>
                            <div class="form-group">
                                <label for="archivo" class="mb-2">Archivo de Imagen</label>
                                <input type="file" class="form-control mb-3" id="archivo" name="archivo" accept="image/*">
                            </div>
                            <!-- Button trigger modal -->
                            <div class="text-end">
                            <button class="btn btn-warning float-start" type="reset">
                                Volver
                            </button>
                            <button type="button" class="btn btn-primary mb-2">
                                Subir
                            </button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmacion</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Esta seguro que desea subir esta foto?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Subir</button>
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