<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CheckoutController;

Route::get('/', [ProductoController::class, 'index'])->name('welcome');
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');

Route::middleware('auth')->group(function () {
    Route::resource('productos', ProductoController::class)->except(['index']);
    Route::get('/mis-productos', [ProductoController::class, 'misProductos'])->name('productos.mis_productos');
    Route::post('/carrito/agregar', [CarritoController::class, 'store'])->name('carrito.store');
    Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
    Route::delete('/carrito/{id}', [CarritoController::class, 'destroy'])->name('carrito.destroy');
    Route::post('/carrito/vaciar', [CarritoController::class, 'clear'])->name('carrito.clear');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::get('/checkout', function () { return view('checkout');})->name('checkout')->middleware('auth');
    Route::post('/procesar-pago', [CheckoutController::class, 'procesarPago'])->name('pago.procesar');
});

Auth::routes();

Route::get('/home', function () {
    return redirect()->route('productos.index');
})->name('home');