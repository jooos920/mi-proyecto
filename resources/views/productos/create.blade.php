@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Producto</h1>
    @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre de la base de rap</label>
            <input type="text" class="form-control form-control-lg" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
        </div>
        
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control form-control-lg" id="descripcion" name="descripcion">{{old('descripcion')}}</textarea>
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" class="form-control form-control-lg" id="precio" name="precio" step="0.01" value="{{old('precio')}}" required>
        </div>

        <div class="form-group">
            <label for="stock">Cantidad</label>
            <input type="number" class="form-control form-control-lg" id="stock" name="stock" value="{{old('stock')}}" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Producto</button>
    </form>
</div>
@endsection
