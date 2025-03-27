<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    public function index()
    {
        $compras = Compra::where('user_id', Auth::id())
                         ->orderBy('created_at', 'desc')
                         ->get();
    
        $compras->each(function ($compra) {
            $compra->productos = json_decode($compra->productos, true);
        });
    
        return view('historial', compact('compras'));
    }
}