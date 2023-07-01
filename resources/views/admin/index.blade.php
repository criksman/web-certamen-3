@extends('templates.master')

@section('main-content')
  <div class="row text-white">
    <div class="col mt-3 text-center mb-3">
      <h1>Lista de Usuarios</h1>
    </div>
  </div>
  
  <div class="card ">
    <div class="card-body card-background">
      <div class="row">
        <div class="col my-3">
          <a href="{{ route('admin.create_user') }}" class="btn btn-primary">Agregar Usuario</a>
        </div>
      </div>
      
      <div class="row">
        <div class="col">
          <table class="table table-bordered table-hover">
            <thead class="table-dark">
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
                    <div class="mb-2">
                      <button type="button" class="btn btn-sm btn-danger @if(Auth::user()->user == $user->user) d-none @endif" data-bs-toggle="modal" data-bs-target="#exampleModal{{$user->user}}">
                        Borrar
                      </button>
                    </div>

                <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$user->user}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$user->user}}" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel{{$user->user}}">Borrar usuario</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            ¿Esta seguro que desea eliminar a este usuario?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Borrar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
              </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
    
@endsection