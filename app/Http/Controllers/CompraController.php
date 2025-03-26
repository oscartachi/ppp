<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    public function index()
    {
        // Obtener las compras del usuario autenticado, ordenadas por fecha
        $compras = Compra::where('user_id', Auth::id())
                         ->orderBy('created_at', 'desc')
                         ->get();

        return view('historial', compact('compras'));
    }
}