@extends('templates.master')

@section('main-content')
<div class="row text-white">
    <div class="col my-3 d-flex flex-column align-items-center"">
        <h1>Editar usuario: {{$user->user}}<h1>
    </div>
</div>

<div class="card text-white">
    <div class="card-body card-background">
        <div class="row">
            <div class="col d-flex flex-column align-items-center">
                <div class="col-6 d-flex flex-column">
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
                    <div class="form-group mt-3">
                        <label for="user">Nombre de usuario:</label>
                        <input type="text" class="form-control" id="user" name="user" placeholder={{$user->user}}>
                    </div>
                    <div class="form-group mt-3">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder={{$user->nombre}}>
                    </div>
                    <div class="form-group mt-3">
                        <label for="apellido">Apellido:</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder={{$user->apellido}}>
                    </div>
                    <div class="form-group mt-3">
                        <label for="perfil_id">Rol:</label>
                        <select class="form-control" id="perfil_id" name="perfil_id">
                        <option value="2" @if($user->perfil->id == 2) selected @endif >Usuario</option>
                        <option value="1" @if($user->perfil->id == 1) selected @endif >Administrador</option>
                        </select>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-warning mt-3">Volver</button>
                        <button type="submit" class="btn btn-primary mt-3">Aplicar Cambios</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
