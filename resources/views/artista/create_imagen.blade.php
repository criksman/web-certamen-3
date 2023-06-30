@extends('templates.master')

@section('main-content')
<div class="row">
    <div class="col">
        <h2 class="my-3">Subir Imagen</h2>
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
        <form method="POST" action="{{ route('artista.storeImagen') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-3">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo">
            </div>
            <div class="form-group mt-3">
            <label for="archivo">Archivo de Imagen</label>
            <input type="file" class="form-control" id="archivo" name="archivo" accept="image/*">
            </div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Subir
            </button>

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
@endsection
