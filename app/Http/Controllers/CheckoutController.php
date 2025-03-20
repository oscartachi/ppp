<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class CheckoutController extends Controller
{
    public function index()
    {
        // Obtener el contenido del carrito
        $itemsCarrito = Cart::getContent();

        if ($itemsCarrito->isEmpty()) {
            return redirect()->route('carrito.index')->with('error', 'El carrito está vacío.');
        }

        // Calcular el total
        $totalCarrito = $itemsCarrito->sum(fn($item) => $item->price * $item->quantity);

        return view('checkout', compact('itemsCarrito', 'totalCarrito'));
    }

    public function procesarPago(Request $request)
    {
        // Simular procesamiento de pago
        Cart::clear(); // Vaciar carrito después del pago

        return redirect()->route('productos.index')->with('success', 'Pago realizado con éxito.');
    }
}