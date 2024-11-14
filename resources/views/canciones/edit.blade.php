
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editaar curso </h1>
    @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif

    <form action="{{ route('canciones.store', $canciones->id) }}" method="POST">
        <input type="hidden" name="id" value="{{ $canciones->id }}">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre del curso</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $canciones->nombre) }}" required>
         </div>
        
        <div class="form-group">
            <label for="descripcion">Descripción del curso</label>
            <textarea class="form-control" id="descripcion" name="descripcion">{{old('descripcion', $canciones->descripcion)}}</textarea>
        </div>

        <div class="form-group">
            <label for="precio">Precio del curso</label>
            <input type="number" class="form-control" id="precio" name="precio" step="0.01" value="{{old('precio', $canciones->precio)}}" required>
        </div>

        <div class="form-group">
            <label for="stock">Cantidad de cursos</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{old('stock', $canciones->stock)}}" required>
        </div>
        <button type="submit" class="btn btn-info">Actuakizar Producto</button>
        <a href="{{route('productos.index')}}" class="btn">Regresar</a>
    </form>
</div>
@endsection
