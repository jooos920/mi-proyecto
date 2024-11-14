@extends('layouts.app')
@section('content')
    <h1>Inciia Sesión</h1>
    <form action="{{ route('login') }}" method="POST">
        @if ($errors->has('loginError'))
            <div class="alert alert-danger">
                {{ $errors->first('loginError') }}
            </div>
        @endif

        @csrf
        <div class="form-group mb-3">
            <label for="correo" class="form-label">Correo Electrónico</label>
            <input type="email" name="correo" id="correo" class="form-control form-control-lg" placeholder="Ingrese su correo" required>
        </div>

        <div class="form-group mb-3">
            <label for="contrasena" class="form-label">Contraseña</label>
            <input type="password" name="contrasena" id="contrasena" class="form-control form-control-lg" placeholder="Ingrese su contraseña" required>
        </div>
        <button type="submit" class="btn btn-info">Iniciar Sesión</button>
    </form>
@endsection
