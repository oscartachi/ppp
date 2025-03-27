<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Compras</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function mostrarNotificacion() {
            document.getElementById('notificacion').classList.remove('hidden');
            setTimeout(() => {
                document.getElementById('notificacion').classList.add('hidden');
            }, 3000);
        }
    </script>
</head>

<body class="bg-gray-100 min-h-screen">
    @include('components.navbar')

    <div class="container mx-auto p-6">
        <h1 class="text-4xl font-extrabold mb-8 text-green-700">🛒 Historial de Compras</h1>

        <!-- Si no hay compras -->
        @if($compras->isEmpty())
            <div class="text-center mt-10">
                <p class="text-gray-600 text-lg">Aún no has realizado compras.</p>
                <a href="{{ route('productos.index') }}" 
                   class="mt-6 inline-block bg-green-600 text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-green-700 transition">
                    🛍️ ¡Explora Productos!
                </a>
            </div>
        @else
            <!-- Agrupar compras por fecha -->
            @foreach($compras->groupBy(fn($compra) => optional($compra->created_at)->format('d \d\e F') ?? 'Fecha desconocida') as $fecha => $grupoCompras)
                <div class="text-lg font-semibold text-gray-700 mb-4">{{ $fecha }}</div>

                @foreach($grupoCompras as $compra)
                    <!-- Mostrar cada producto dentro de la compra -->
                    @foreach($compra->productos as $producto)
                        <div class="bg-white p-6 mb-6 rounded-lg shadow-lg border-l-4 border-green-600 hover:shadow-xl transition-transform transform hover:-translate-y-1">
                            <div class="flex items-center">
                                <!-- Imagen del producto -->
                                <img src="{{ isset($producto['attributes']['imagen']) ? asset('storage/' . $producto['attributes']['imagen']) : asset('img/default-product.png') }}" 
                                  alt="Imagen de {{ $producto['name'] ?? 'Producto' }}" 
                                   class="w-20 h-20 rounded-lg object-cover mr-6">

                                <!-- Detalles del producto -->
                                <div class="flex-1">
                                    <h2 class="text-xl font-bold text-gray-800">{{ $producto['name'] }}</h2>
                                    <p class="text-gray-600 mt-1">Cantidad: <span class="font-semibold">{{ $producto['quantity'] }}</span></p>
                                    <p class="text-gray-600 mt-1">Precio: <span class="font-semibold">${{ number_format($producto['price'], 2, '.', ',') }} MXN</span></p>
                                    <p class="text-green-600 font-semibold mt-2">📦 Entregado el {{ optional($compra->created_at)->format('d/m/Y') }}</p>
                                </div>

                                <!-- Botón de volver a comprar -->
                                <a href="{{ route('productos.index') }}" class="ml-auto text-green-600 font-semibold hover:underline">
                                    🔄 Volver a comprar
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            @endforeach
        @endif
    </div>
</body>

</html>