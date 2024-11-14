@extends('layouts/app')

@section('content')
    <div class="container">
        <h1>BIENVENIDO A MI PAGINA DE DE CANCIONES</h1>



        <table border="1">
            
            <tr>
                <table class="table-primary"><a href="{{ route('usuarios.index') }}">Ver Usuarios</a></table>
           <td> <a href="{{ route('usuarios.index') }}">Ver Usuarios</a></td>
            </tr>
 

            <tr>
            <br>
           <td> <a href="{{ route('productos.index') }}">Ver Productos</a></td>
            </tr>

            <tr>
            <br>
          <td>  <a href="{{ route('login') }}">Inicia Sesión</a></td>
          <td>
            <a href="{{route('logout')}}">cerrar Sesion</a>
          </td>
            </tr>

        </table>

        <tr>
            <br>
            <td> <a href="{{ route('canciones.index') }}">canciones</a></td>
    </div>
@endsection




<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
    <button type="button" class="btn btn-primary">1</button>
    <button type="button" class="btn btn-primary">2</button>
  
    <div class="btn-group" role="group">
      <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        Dropdown
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Dropdown link</a></li>
        <li><a class="dropdown-item" href="#">Dropdown link</a></li>
      </ul>
    </div>
  </div>
  
   