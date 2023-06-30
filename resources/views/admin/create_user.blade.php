@extends('templates.master')

@section('main-content')

<div class="row">
    <div class="col">
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
            <div class="form-group">
                <label for="user">Nombre de usuario:</label>
                <input type="text" class="form-control" id="user" name="user" placeholder="Ingrese el nombre de usuario">
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese la contraseña">
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre">
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese el apellido">
            </div>
            <div class="form-group">
                <label for="perfil_id">Rol:</label>
                <select class="form-control" id="perfil_id" name="perfil_id">
                <option value="2">Usuario</option>
                <option value="1">Administrador</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Usuario</button>
        </form>
    </div>
</div>
@endsection
