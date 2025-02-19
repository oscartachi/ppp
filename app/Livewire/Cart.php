<?php

namespace App\Livewire; // 🛑 No App\Http\Livewire

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Cart extends Component
{
    protected $listeners = ['cartUpdated' => '$refresh'];

    public function addToCart($name, $price)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$name])) {
            $cart[$name]['quantity'] += 1;
        } else {
            $cart[$name] = [
                'name' => $name,
                'price' => $price,
                'quantity' => 1
            ];
        }

        Session::put('cart', $cart);
        $this->emit('cartUpdated'); 
    }

    public function removeFromCart($name)
    {
        $cart = Session::get('cart', []);
        unset($cart[$name]);
        Session::put('cart', $cart);
        $this->emit('cartUpdated');
    }

    public function clearCart()
    {
        Session::forget('cart');
        $this->emit('cartUpdated');
    }

    public function render()
    {
        return view('livewire.cart', ['cart' => Session::get('cart', [])]);
    }
}
