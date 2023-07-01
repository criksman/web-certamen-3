@extends('templates.master')

@section('main-content')
<div class="row text-white">
    <div class="col my-3 col d-flex flex-column align-items-center">
        <h1>Ingresar usuario</h1>
    </div>
</div>
<div class="card">
    <div class="card-body text-white card-background">
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
                    <form method="POST" action="{{ route('admin.storeUser') }}">
                        @csrf
                        <div class="form-group mt-3">
                            <label for="user">Nombre de usuario:</label>
                            <input type="text" class="form-control" id="user" name="user" placeholder="Ingrese el nombre de usuario">
                        </div>
                        <div class="form-group mt-3">
                            <label for="password">Contraseña:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese la contraseña">
                        </div>
                        <div class="form-group mt-3">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre">
                        </div>
                        <div class="form-group mt-3">
                            <label for="apellido">Apellido:</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese el apellido">
                        </div>
                        <div class="form-group mt-3">
                            <label for="perfil_id">Rol:</label>
                            <select class="form-control" id="perfil_id" name="perfil_id">
                            <option value="2">Usuario</option>
                            <option value="1">Administrador</option>
                            </select>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-warning mt-3">Volver</button>
                            <button type="submit" class="btn btn-primary mt-3 mr-2">Agregar Usuario</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
