<?php

namespace App\Http\Controllers;

use App\Models\Canciones;
use Illuminate\Http\Request;

class CancionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $canciones=Canciones::all();
        return view('canciones.index', compact('canciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('canciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'artista' => 'nullable|string|max:500',
            'genero' => 'nullable|string|max:500',
            'album' => 'nullable|string|max:500',
            'anio' => 'nullable|integer',
        ]);

        Canciones::create($validated);
        return redirect()->route('canciones.index')->with('success', 'Cancion Creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Canciones $canciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cancion = Canciones::find($id);

        if (!$cancion) {
            return redirect()->route('canciones.index')->with('error', 'No se encontró el cancion');
        }

        return view('canciones.edit', compact('cancion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cancion = Canciones::find($id);

        if (!$cancion) {
            return redirect()->route('canciones.index')->with('error', 'No se encontró el cancion');
        }

        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'artista' => 'nullable|string|max:500',
            'genero' => 'nullable|string|max:500',
            'album' => 'nullable|string|max:500',
            'anio' => 'nullable|integer',
        ]);

        $cancion->update($validated);
        return redirect()->route('productos.index')->with('success', 'Producto Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cancion = Canciones::find($id);

        if (!$cancion) {
            return redirect()->route('canciones.index')->with('error', 'No se encontró el cancion');
        }

        $cancion->delete();
        return redirect()->route('canciones.index')->with('success', 'Se borró el cancion');
    }
}
