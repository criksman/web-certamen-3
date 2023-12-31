<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de Índice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body{
            background-color: #311151;
        }

        .card-background{
            background-color: #824968;
            height: 100%;
            width: 100%;
        }
    </style>
</head>
<body>


<div class="container mt-5">
    <div class="card">
        <div class="card-body card-background">
            <div class="row text-white">
                        <div class="col-md-8 offset-md-2">
                        <h2>Editar Imagen</h2>
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
                        <form method="POST" action="{{ route('artista.updateImagen', $imagen->id) }}" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-group">
                            <label for="titulo">Título</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="{{ $imagen->titulo }}">
                            </div>
                            <!-- Button trigger modal -->
                            <div class="modal-footer d-flex justify-content-between">
                                <button type="button" class="btn btn-warning mt-3">Volver</button>
                                <button type="button" class="btn btn-primary mt-3 mr-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Actualizar
                                </button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-black" id="exampleModalLabel">Confirmacion</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-black">
                                    ¿Esta seguro que desea actualizar el titulo esta foto?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
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
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>