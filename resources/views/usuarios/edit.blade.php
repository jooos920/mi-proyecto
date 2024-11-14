@extends('layouts/app')
@section('content')
    <div class="container">
        <h1>Crear Usuario</h1>
        <form action="{{ route('usuarios.update', $user->id) }}" method="POST">
            <input type="hidden" name="id" value="{{$user->id}}">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <div>
                <label for="nombre" class="form-label">Nombre del Usuario:</label>
                <input type="text" id="nombre" name="nombre" class="form-control form-control-lg" value="{{ old('nombre', $user->nombre) }}" required>
            </div>

            <div>
                <label for="correo" class="form-label">Email:</label>
                <input type="email" id="correo" name="correo" class="form-control form-control-lg" value="{{ old('correo', $user->correo) }}"
                    required>
            </div>
            <div>
                <label for="telefono" class="form-label">Telefono:</label>
                <input type="text" id="telefono" name="telefono" class="form-control form-control-lg" value="{{ old('telefono', $user->telefono) }}"
                    required>
            </div>
            <div>
                <label for="direccion" class="form-label">Direccion:</label>
                <input type="text" id="direccion" name="direccion" class="form-control form-control-lg" value="{{ old('direccion', $user->direccion) }}"
                    required>
            </div>
            <div>
                <label for="contrasena" class="form-label  form-control-lg">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" class=" form-control form-control-lg">
                <small class="form-text text-muted">Deja vacio si no quieres cambiar contraseña</small>
            </div>
            <div>
                <button type="submit" class="btn btn-dark">actaualizar Usuario</button>
            </div>
            <a href="{{route('usuarios.index')}}" class="btn">Regresar</a>
        </form>
    </div>

@endsection
