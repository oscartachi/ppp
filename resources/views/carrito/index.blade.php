<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
@include('components.navbar')

<body class="bg-gray-100">

    <div class="container mx-auto p-8 max-w-4xl">
        <h1 class="text-3xl font-extrabold text-green-700 text-center mb-6">🛒 Carrito de Compras</h1>

        @if(session('success'))
            <p class="bg-green-500 text-white p-2 rounded text-center">{{ session('success') }}</p>
        @endif

        <div class="bg-white shadow-lg rounded-lg p-6">
            <ul class="divide-y divide-gray-300">
                @php $totalCarrito = 0; @endphp
                @forelse ($itemsCarrito as $item)
                    @php
                        $subtotal = $item->price * $item->quantity;
                        $totalCarrito += $subtotal;
                    @endphp
                    <li class="py-4 flex items-center justify-between">
                        <div class="flex items-center">
                            <img src="{{ asset('storage/' . $item->attributes->imagen) }}" alt="Imagen del producto" class="w-20 h-20 object-cover rounded-md border border-gray-300 shadow-sm">
                            <div class="ml-4">
                                <p class="text-lg font-semibold text-green-700">{{ $item->name }}</p>
                                <p class="text-sm text-gray-600">Cantidad: <span class="font-semibold">{{ $item->quantity }} kg</span></p>
                                <p class="text-sm text-gray-700 font-semibold">Precio unitario: ${{ $item->price }} MXN</p>
                                <p class="text-md font-bold text-green-800 mt-1">Subtotal: ${{ $subtotal }} MXN</p>
                            </div>
                        </div>
                        <form action="{{ route('carrito.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition-all duration-300">
                                ❌ Eliminar
                            </button>
                        </form>
                    </li>
                @empty
                    <p class="text-gray-500 text-center py-4">No hay productos en el carrito.</p>
                @endforelse
            </ul>

            @if($totalCarrito > 0)
                <div class="mt-6 text-right">
                    <p class="text-xl font-extrabold text-green-800">Total a pagar: <span class="text-2xl text-green-700">${{ $totalCarrito }} MXN</span></p>
                </div>

                <div class="mt-6 flex justify-between">
                    <form action="{{ route('carrito.clear') }}" method="POST">
                        @csrf
                        <button class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow-lg hover:bg-blue-700 transition-all duration-300">
                            🗑 Vaciar Carrito
                        </button>
                    </form>

                    <a href="{{ route('checkout') }}" class="bg-green-700 text-white px-6 py-2 rounded-lg shadow-lg hover:bg-green-800 transition-all duration-300">
                        ✅ Proceder al Pago
                    </a>
                </div>
            @endif
        </div>
    </div>

</body>
</html>