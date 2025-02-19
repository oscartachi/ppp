<div class="mt-8 p-4 bg-white dark:bg-gray-700 shadow-lg rounded-lg">
    <h3 class="text-lg font-bold text-green-700 dark:text-green-300">{{ __('Carrito de Compras') }}</h3>

    @if(empty($cart))
        <p class="mt-2 text-gray-700 dark:text-gray-300">{{ __('Tu carrito está vacío.') }}</p>
    @else
        <ul class="mt-4">
            @foreach($cart as $name => $item)
                <li class="flex justify-between items-center border-b py-2">
                    <span>{{ $item['name'] }} ({{ $item['quantity'] }}) - <strong>${{ $item['price'] * $item['quantity'] }}</strong></span>
                    <button wire:click="removeFromCart('{{ $name }}')" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">X</button>
                </li>
            @endforeach
        </ul>
        <button wire:click="clearCart" class="mt-4 bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">{{ __('Vaciar Carrito') }}</button>
    @endif
</div>