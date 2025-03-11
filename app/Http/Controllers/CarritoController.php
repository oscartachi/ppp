<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class CarritoController extends Controller
{
    public function store(Request $request)
    {
        // Buscar el producto en la BD
        $producto = Producto::findOrFail($request->producto_id);

        // Agregarlo al carrito
        Cart::add([
            'id'       => $producto->id,
            'name'     => $producto->nombre,
            'price'    => $producto->precio,
            'quantity' => $request->cantidad,
            'attributes' => [
                'imagen' => $producto->imagen, 
                'descripcion' => $producto->descripcion,
            ]
        ]);

        return redirect()->route('carrito.index')->with('success', 'Producto agregado al carrito');
    }

    public function index()
    {
        // Obtener el contenido del carrito
        $itemsCarrito = Cart::getContent();

        // Filtrar solo los productos que tienen cantidad mayor a 0
        $itemsCarrito = $itemsCarrito->filter(function ($item) {
            return $item->quantity > 0;
        });

        return view('carrito.index', compact('itemsCarrito'));
    }

    public function destroy($id)
    {
        // Eliminar un producto del carrito
        Cart::remove($id);

        return redirect()->route('carrito.index')->with('success', 'Producto eliminado del carrito');
    }

    public function clear()
    {
        // Vaciar todo el carrito
        Cart::clear();

        return redirect()->route('carrito.index')->with('success', 'Carrito vaciado');
    }
}