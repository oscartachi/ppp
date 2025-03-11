<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CheckoutController;


Route::resource('productos', ProductoController::class);
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/carrito/agregar', [CarritoController::class, 'store'])->name('carrito.store');
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::delete('/carrito/{id}', [CarritoController::class, 'destroy'])->name('carrito.destroy');
Route::post('/carrito/vaciar', [CarritoController::class, 'clear'])->name('carrito.clear');
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/mis-productos', [ProductoController::class, 'misProductos'])->name('productos.mis_productos')->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', function () {
    return redirect()->route('productos.index'); // Cambia a la ruta que muestra los productos
})->name('home');
