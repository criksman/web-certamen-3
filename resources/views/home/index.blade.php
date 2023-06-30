@extends('templates.master')

@section('main-content')
<div class="row">
  <div class="col-md-8 offset-md-2">
    <div class="jumbotron text-center">
      <h1>Bienvenido a Instagram 2</h1>
      <p>Sube tus fotos y compártelas con otros usuarios</p>
      <a href="{{ route('artista.create_imagen') }}" class="btn btn-primary">Subir Foto</a>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-8 offset-md-2">
    <h2>Fotos Subidas</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Foto</th>
          <th>Titulo</th>
          <th>Baneado</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($imagenes as $imagen)
        <tr>
          <td> <a href="{{ asset('storage/documentos/img/' . $imagen->archivo) }}" target="_blank"> {{$imagen->titulo}} </a></td>
          <td> {{ $imagen->titulo }} </td>
          <td> @if($imagen->baneada == 0) No @else Si @endif</td>
          <td>
            <a href="{{ route('artista.edit_imagen', $imagen->id) }}" class="btn btn-sm btn-primary">Editar</a>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$imagen->id}}">
              Eliminar
            </button>
            <!-- Modal -->
            <form method="POST" action={{ route('artista.destroyImagen', $imagen->id) }}>
              @method('delete')
              @csrf
              <div class="modal fade" id="exampleModal{{$imagen->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$imagen->id}}" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel{{$imagen->id}}">Confirmacion</h1>
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
            <button type="button" class="btn btn-sm btn-danger @if($imagen->baneada == 0) d-none @endif" data-bs-toggle="modal" data-bs-target="#exampleModal2{{$imagen->id}}">
              Motivo de ban
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal2{{$imagen->id}}" tabindex="-1" aria-labelledby="exampleModalLabel2{{$imagen->id}}" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel2{{$imagen->id}}">Motivo de ban</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    {{$imagen->motivo_ban}}
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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
@endsection