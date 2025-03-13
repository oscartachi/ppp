<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; // <-- IMPORTANTE, AGREGA ESTA LÍNEA

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function misProductos()
    {
    $productos = Producto::where('user_id', auth()->id())->get();
    return view('productos.mis_productos', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function destroy($id)
    {
    $producto = Producto::findOrFail($id);
    $producto->delete();

    return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente');
    }

    public function edit($id)
    {
    try {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return redirect()->route('productos.index')->with('error', 'Producto no encontrado');
    }
    }
    
    public function update(Request $request, $id)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'precio' => 'required|numeric',
        'imagen' => 'nullable|image|max:2048',
        'categoria' => 'required|string'
    ]);

    $producto = Producto::findOrFail($id);
    $producto->nombre = $request->nombre;
    $producto->descripcion = $request->descripcion;
    $producto->precio = $request->precio;
    $producto->categoria = $request->categoria;

    // Guardar imagen si se subió
    if ($request->hasFile('imagen')) {
        $imagenPath = $request->file('imagen')->store('productos', 'public');
        $producto->imagen = $imagenPath;
    }

    $producto->save();

    return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
}

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'imagen' => 'image|nullable|max:2048',
            'categoria' => 'required'
            
        ]);

        // Guardar la imagen si se sube
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('imagenes', 'public');
        } else {
            $imagenPath = null;
        }

        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'imagen' => $imagenPath,
            'categoria' => $request->categoria,
            'user_id' =>  auth()->id()
        ]);
        

        return redirect()->route('productos.index');
    }
}