<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Compra;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    public function store(Request $request)
    {
        // Buscar el producto en la base de datos
        $producto = Producto::findOrFail($request->producto_id);

        // Agregar el producto al carrito
        Cart::add([
            'id'       => $producto->id,
            'name'     => $producto->nombre,
            'price'    => $producto->precio,
            'quantity' => $request->cantidad,
            'attributes' => [
                'imagen'      => $producto->imagen,
                'descripcion' => $producto->descripcion,
            ]
        ]);

        return redirect()->route('carrito.index')->with('success', 'Producto agregado al carrito');
    }

    public function index()
    {
        // Obtener el contenido del carrito
        $itemsCarrito = Cart::getContent();

        // Filtrar productos con cantidad mayor a 0
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
        // Vaciar el carrito
        Cart::clear();

        return redirect()->route('carrito.index')->with('success', 'Carrito vaciado');
    }

    public function checkout()
    {
        $itemsCarrito = Cart::getContent();

        if ($itemsCarrito->isEmpty()) {
            return redirect()->route('carrito.index')->with('warning', 'Tu carrito está vacío.');
        }

        return view('checkout', compact('itemsCarrito'));
    }

    public function procesarCompra()
    {
        $itemsCarrito = Cart::getContent();

        if ($itemsCarrito->isEmpty()) {
            return redirect()->route('carrito.index')->with('warning', 'Tu carrito está vacío.');
        }

        $totalCarrito = $itemsCarrito->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        // Guardar la compra en la base de datos
        Compra::create([
            'user_id'   => Auth::id(),
            'productos' => json_encode($itemsCarrito),
            'total'     => $totalCarrito,
        ]);

        // Limpiar el carrito
        Cart::clear();

        // Redirigir a la página principal con mensaje de éxito
        return redirect()->route('productos.index')->with('success', 'Compra realizada con éxito.');
    }
}