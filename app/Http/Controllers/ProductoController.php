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
            'categoria' => $request->categoria
        ]);
        

        return redirect()->route('productos.index');
    }
}