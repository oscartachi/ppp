<?php


use App\Http\Controllers\CompraController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ProductoController;

Route::get('/', [ProductoController::class, 'index'])->name('welcome');
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');

Route::middleware('auth')->group(function () {
    Route::resource('productos', ProductoController::class)->except(['index']);
    Route::get('/mis-productos', [ProductoController::class, 'misProductos'])->name('productos.mis_productos');

    // Rutas del carrito
    Route::post('/carrito/agregar', [CarritoController::class, 'store'])->name('carrito.store');
    Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
    Route::delete('/carrito/{id}', [CarritoController::class, 'destroy'])->name('carrito.destroy');
    Route::post('/carrito/vaciar', [CarritoController::class, 'clear'])->name('carrito.clear');

    // Rutas del checkout
    Route::get('/checkout', [CarritoController::class, 'checkout'])->name('checkout');
    Route::post('/procesar-pago', [CarritoController::class, 'procesarCompra'])->name('pago.procesar');

    Route::get('/historial', [CompraController::class, 'index'])->name('historial');
});

Auth::routes();

Route::get('/home', function () {
    return redirect()->route('productos.index');
})->name('home');