@extends ('layouts/app')
@section('content')
<h1>Lista de canciones</h1>
<a href="{{route('canciones.create')}}" class="btn btn-primary">Crear Cancion</a>
<table>
    <tr>
        <th>Nombre</th>
        <th>Artista</th>
        <th>Genero</th>
        <th>Album</th>
        <th>Anio</th>
        <th>Acciones</th>
    </tr>
    <tr>
        @foreach ($canciones as $cancion)
    
        <td>{{$cancion->nombre}}</td>
        <td>{{$cancion->artista}}</td>
        <td>{{$cancion->genero}}</td>
        <td>{{$cancion->album}}</td>
        <td>{{$cancion->anio}}</td>
        <td><a href="{{route('canciones.edit', $cancion->id)}}">Editar</a></td>
        <td><a href="{{route('canciones.destroy', $cancion->id)}}">Eliminar</a></td>
@endforeach
    </tr>
    
</table>

@endsection