@extends('templates.master')

@section('main-content')

<h1>Publicaciones</h1>

<div class="row">
    <div class="col">
        <form method="GET" action="{{route('publico.index')}}">
            @csrf
            <div class="mb-3">
            <label for="usuario">Filtrar por Usuario:</label>
            <select name="user" id="user">
                <option value="">Todos</option>
                @foreach ($users as $user)
                    <option value="{{ $user->user }}">{{ $user->user }}</option>
                @endforeach
            </select>
            <button type="submit">Filtrar</button>
            </div>
        </form>
    </div>
</div>

<!-- LO QUE VIENE A CONTINUACIÓN DA CANCER VISUAL (HAY QUE ACORTAR ESTO, AL MOMENTO DE HACER ESTO NO ESTOY PENSANDO LLEVO 5 HORAS ESCRIBIENDO CÓDIGO Y POSIBLEMENTE ME VAYA A COSTAR DENTRO DE POCO) -->
<div class="row">
    <div class="col">
        @if($imagenesFiltradas != null)
            @foreach ($imagenesFiltradas as $imagen)
                <div class="col-md-4 @if($imagen->baneada == 1 && Gate::denies('administracion-mostrar')) d-none @endif">
                    <a href="{{ asset('storage/documentos/img/' . $imagen->archivo) }}" target="_blank">
                    <img src="{{ asset('storage/documentos/img/' . $imagen->archivo) }}" alt="{{ $imagen->titulo }}" style="max-width: 100%">
                    </a>
                    <span>Título: {{ $imagen->titulo }}</span>
                    <p>Publicado por: {{ $imagen->cuenta->user }}</p>
                    @if(Gate::allows('administracion-mostrar'))
                        @if($imagen->baneada == 0)
                            <form method="POST" action="{{ route('admin.banImagen', $imagen->id) }}">
                                @method('put')
                                @csrf
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{$imagen->id}}" data-bs-whatever="@mdo">Banear publicación</button>

                                <div class="modal fade" id="exampleModal{{$imagen->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$imagen->id}}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel{{$imagen->id}}">Martillo de baneo</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Motivo de ban:</label>
                                            <textarea class="form-control" id="message-text" name="motivo_ban"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-warning">Banear y enviar mensaje</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </form>
                        @else
                            <form method="POST" action="{{ route('admin.UnBanImagen', $imagen->id) }}"> 
                                @method('put')
                                @csrf
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal2{{$imagen->id}}">
                                    Desbanear
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal2{{$imagen->id}}" tabindex="-1" aria-labelledby="exampleModalLabel2{{$imagen->id}}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel2{{$imagen->id}}">Otra oportunidad</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Esta seguro que desea desbanear la publicación?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-success">Desbanear</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </form>
                        @endif
                    @endif
                    <hr>
                </div>
            @endforeach
        @else
           @foreach ($imagenes as $imagen)
                <div class="col-md-4 @if($imagen->baneada == 1 && Gate::denies('administracion-mostrar')) d-none @endif">
                    <a href="{{ asset('storage/documentos/img/' . $imagen->archivo) }}" target="_blank">
                    <img src="{{ asset('storage/documentos/img/' . $imagen->archivo) }}" alt="{{ $imagen->titulo }}" style="max-width: 100%">
                    </a>
                    <span>Título: {{ $imagen->titulo }}</span>
                    <p>Publicado por: {{ $imagen->cuenta->user }}</p>
                    @if(Gate::allows('administracion-mostrar'))
                        @if($imagen->baneada == 0)
                            <form method="POST" action="{{ route('admin.banImagen', $imagen->id) }}">
                                @method('put')
                                @csrf
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{$imagen->id}}" data-bs-whatever="@mdo">Banear publicación</button>

                                <div class="modal fade" id="exampleModal{{$imagen->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$imagen->id}}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel{{$imagen->id}}">Martillo de baneo</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Motivo de ban:</label>
                                            <textarea class="form-control" id="message-text" name="motivo_ban"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-warning">Banear y enviar mensaje</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </form>
                        @else
                            <form method="POST" action="{{ route('admin.UnBanImagen', $imagen->id) }}"> 
                                @method('put')
                                @csrf
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal2{{$imagen->id}}">
                                    Desbanear
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal2{{$imagen->id}}" tabindex="-1" aria-labelledby="exampleModalLabel2{{$imagen->id}}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel2{{$imagen->id}}">Otra oportunidad</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Esta seguro que desea desbanear la publicación?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-success">Desbanear</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </form>
                        @endif
                    @endif
                    <hr>
                </div>
            @endforeach
        @endif
    </div>
</div>

@endsection