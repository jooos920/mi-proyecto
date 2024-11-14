<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\ProductosCategorias;
use App\Models\Proveedores;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PRoductosController extends Controller
{
    public function index()
    {
        $productos = Productos::paginate(10);
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string|max:500',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:1',
        ]);

        Productos::create($validated);
        return redirect()->route('productos.index')->with('success', 'Producto Creado');
    }

    public function edit($id)
    {
        $producto = Productos::find($id);

        if (!$producto) {
            return redirect()->route('productos.index')->with('error', 'No se encontró el producto');
        }

        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $producto = Productos::find($id);

        if (!$producto) {
            return redirect()->route('productos.index')->with('error', 'No se encontró el producto');
        }

        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string|max:500',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:1',
        ]);

        $producto->update($validated);
        return redirect()->route('productos.index')->with('success', 'Producto Actualizado');
    }

    public function destroy($id)
    {
        $producto = Productos::find($id);

        if (!$producto) {
            return redirect()->route('productos.index')->with('error', 'No se encontró el producto');
        }

        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Se borró el producto');
    }
}
