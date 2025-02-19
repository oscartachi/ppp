<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

use App\Livewire\Cart;

Route::get('/cart', Cart::class)->name('cart');

Route::resource('products', ProductController::class);

Route::get('/checkout', function () {
    return view('checkout'); // Asegúrate de tener una vista llamada 'checkout.blade.php'
})->name('checkout');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';