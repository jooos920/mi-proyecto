<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function verLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['correo' => $request->correo, 'password' => $request->contrasena])) {
        if(Auth::user()->rol!=='administrador'){
                return redirect()->route('bienvenido');
        }
            return redirect()->route('home');
    }
        return redirect()->route('login')->withErrors(['loginError' => 'No se pudo Iniciar Sesión']);

    }
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

}
