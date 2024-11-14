@extends('layouts.app')

@section('content')
<div class="container">
    <h1>canciones</h1>
    @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif

    <form action="{{ route('canciones.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre de la cancion</label>
            <input type="text" class="form-control form-control-lg" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
        </div>
        
        <div class="form-group">
            <label for="descripcion">artista</label>
            <textarea class="form-control form-control-lg" id="artista" name="artista">{{old('artista')}}</textarea>
        </div>
     
        <div class="form-group">
            <label for="descripcion">genero</label>
            <textarea class="form-control form-control-lg" id="genero" name="genero">{{old('genero')}}</textarea>
        </div>
        

        <div class="form-group">
            <label for="descripcion">album</label>
            <textarea class="form-control form-control-lg" id="album" name="album">{{old('album')}}</textarea>
        </div>

        <div class="form-group">
            <label for="precio">anio</label>
            <input type="number" class="form-control form-control-lg" id="anio" name="anio" step="0.01" value="{{old('anio')}}" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear canciones </button>
    </form>
</div>
@endsection
