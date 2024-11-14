@extends('layouts/app')

@section('content')
<div class="container">
    <h1>Lista de Usuarios</h1>
    <a href="{{ route('usuarios.create') }}" class="btn btn-info">Agregar Usuario</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Password</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->nombre }}</td>
                    <td>{{ $user->correo }}</td>
                    <td>{{ $user->telefono }}</td>
                    <td>{{ $user->direccion }}</td>
                    <td>{{ $user->contrasena }}</td>
                    <td>
                        <a href="{{ route('usuarios.edit', $user->id) }}" class="btn btn-dark">Editar</a>
                        <a href="{{ route('usuarios.destroy', $user->id) }}"class="btn btn-secondary">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links('pagination::bootstrap-5') }}
    <a href="{{ route('home') }}">Regresar al inicio</a>
</div>
@endsection
