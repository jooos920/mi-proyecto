<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CancionesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdministradorAutenticado;

Route::get('/bienvenido', function () {
    return view('bienvenido');
})->name('bienvenido');

Route::middleware(AdministradorAutenticado::class)->group(function(){
    Route::get('/', HomeController::class)->name('home');
});
Route::get('/login', [AuthController::class, 'verLogin'])->name('verLogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/productos', [ProductosController::class, 'index'])->name('productos.index');
Route::get('/crear/producto', [ProductosController::class, 'create'])->name('productos.create');
Route::post('/crear/producto', [ProductosController::class, 'store'])->name('productos.store');
Route::get('/editar/producto/{producto}', [ProductosController::class, 'edit'])->name('productos.edit');
Route::post('/editar/producto/{producto}', [ProductosController::class, 'update'])->name('productos.update');
Route::get('/eliminar/producto/{id}', [ProductosController::class, 'destroy'])->name('productos.destroy');

Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');
Route::get('/crear/usuario', [UsuariosController::class, 'create'])->name('usuarios.create');
Route::post('/crear/usuario', [UsuariosController::class, 'store'])->name('usuarios.store');
Route::get('/editar/usuario/{user}', [UsuariosController::class, 'edit'])->name('usuarios.edit');
Route::post('/editar/usuario/{user}', [UsuariosController::class, 'update'])->name('usuarios.update');
Route::get('/eliminar/usuario/{id}', [UsuariosController::class, 'destroy'])->name('usuarios.destroy');

Route::get('/canciones', [CancionesController::class, 'index'])->name('canciones.index');
Route::get('/crear/cancion', [CancionesController::class, 'create'])->name('canciones.create');
Route::post('/crear/cancion', [CancionesController::class, 'store'])->name('canciones.store');
Route::get('/editar/cancion/{cancion}', [CancionesController::class, 'edit'])->name('canciones.edit');
Route::post('/editar/cancion/{cancion}', [CancionesController::class, 'update'])->name('canciones.update');
Route::get('/eliminar/cancion/{id}', [CancionesController::class, 'destroy'])->name('canciones.destroy');
