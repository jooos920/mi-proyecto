@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editaar Producto</h1>
    @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif

    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
        <input type="hidden" name="id" value="{{ $producto->id }}">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre del Producto</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre) }}" required>
        </div>
        
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion">{{old('descripcion', $producto->descripcion)}}</textarea>
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" step="0.01" value="{{old('precio', $producto->precio)}}" required>
        </div>

        <div class="form-group">
            <label for="stock">Cantidad</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{old('stock', $producto->stock)}}" required>
        </div>
        <button type="submit" class="btn btn-info">Actuakizar Producto</button>
        <a href="{{route('productos.index')}}" class="btn">Regresar</a>
    </form>
</div>
@endsection
