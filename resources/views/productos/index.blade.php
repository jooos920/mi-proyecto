@extends('layouts/app')

@section('content')
<div class="container">
    <h1>Lista de Productos</h1>
    <a href="{{ route('productos.create') }}" class="btn btn-info">Agregar Producto</a>
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>
                        <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-dark">Editar</a>
                        <a href="{{ route('productos.destroy', $producto->id) }}"class="btn btn-secondary">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $productos->links('pagination::bootstrap-5') }}
    <a href="{{ route('home') }}">Regresar al inicio</a>
</div>
@endsection
