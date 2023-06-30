@extends('templates.master')

@section('main-content')
<div class="row">
  <div class="col mt-3">
    <div class="jumbotron text-center">
      <h1>Bienvenido a Instagram 2</h1>
      @if(Gate::allows('administracion-mostrar'))
        <p>Has iniciado sesión como administrador, para publicar fotos inicia sesión como artista.</p>
      @else
        <p>Sube tus fotos y compártelas con otros usuarios</p>
        <a href="{{ route('artista.create_imagen') }}" class="btn btn-primary">Subir Foto</a>
      @endif
    </div>
  </div>
</div>

@if(Gate::denies('administracion-mostrar'))
  <div class="row">
    @foreach(Auth::user()->imagenes as $imagen)
      <div class="col p-5 d-flex flex-column justify-content-center align-items-center">
          <a href="{{ asset('storage/documentos/img/' . $imagen->archivo) }}" target="_blank">
          <img src="{{ asset('storage/documentos/img/' . $imagen->archivo) }}" alt="{{ $imagen->titulo }}" style="max-width: 100%">
          </a>
          <p></p>
          <p>Título: {{ $imagen->titulo }}</p>
          @if($imagen->baneada == 1)
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$imagen->id}}">
              Motivo de baneo
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{$imagen->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$imagen->id}}" aria-hidden="true">
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  </div>
                </div>
              </div>
            </div>
          @endif
          <a class="btn btn-secondary" href="{{route('artista.edit_imagen', $imagen->id)}}">Editar</a>
          <!-- Button trigger modal -->
          <form method="POST" action="{{ route('artista.destroyImagen', $imagen->id) }}">
            @method('delete')
            @csrf
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2{{$imagen->id}}">
              Eliminar
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal2{{$imagen->id}}" tabindex="-1" aria-labelledby="exampleModalLabel2{{$imagen->id}}" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel2{{$imagen->id}}">Eliminar imagen</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    ¿Esta seguro que desea eliminar esta imagen?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Borrar</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
      </div>
      <hr>  
    @endforeach
  </div>
@endif
@endsection