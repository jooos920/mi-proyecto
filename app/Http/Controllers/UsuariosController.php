<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UsuariosController extends Controller
{
    public function index()
    {
        $users = Usuarios::paginate(10);
        return view('usuarios.index', compact('users'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'correo' => 'required|email|max:300',
            'telefono'=>'required|string|max:10',
            'direccion'=>'required|string|max:300',
            'contrasena' => 'required|string|min:8',
        ]);

        Usuarios::create([
            'nombre' => $validated['nombre'],
            'correo' => $validated['correo'],
            'telefono'=>$validated['telefono'],
            'direccion'=>$validated['direccion'],
            'contrasena' => Hash::make($validated['contrasena']),
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente!');
    }

    public function edit($id)
    {
        $user = Usuarios::find($id);
        if (!$user) {
            return redirect()->route('usuarios.index')->with('success', 'Usuario no encontrado');
        }
        return view('usuarios.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Usuarios::find($request->id);

        if (!$user) {
            return redirect()->route('usuarios.index')->with('success', 'Usuario no encontrado');
        }

        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'correo' => 'required|email|max:300',
            'telefono'=>'required|string|max:10',
            'direccion'=>'required|string|max:300',
            'contrasena' => 'nullable|string|min:8',
        ]);

        $user->nombre = $validated['nombre'];
        $user->correo = $validated['correo'];
        $user->telefono=$validated['telefono'];
        $user->direccion=$validated['direccion'];
        if (!empty($validated['contasena'])) {
            $user->contrasena = Hash::make($validated['contrasena']);
        }
        $user->save();

        return redirect()->route('usuarios.index')->with('success', 'Los datos han sido guardados correctamente');
    }

    public function destroy($id)
    {
        $user = Usuarios::find($id);

        if (!$user) {
            return redirect()->route('usuarios.index')->with('success', 'Usuario no encontrado');
        }
        $user->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
