<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function procesarPago(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'monto' => 'required|numeric|min:1',
            'tarjeta' => 'required|digits:16',
            'expiracion' => 'required|date_format:Y-m',
            'cvv' => 'required|digits:3'
        ]);

        return redirect()->route('checkout')->with('success', '¡Pago procesado con éxito!');
    }
}