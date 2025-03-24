<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen de Pedido</title>
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

    <div id="notificacion"
        class="hidden fixed top-4 right-4 bg-green-500 text-white py-3 px-6 rounded-lg shadow-lg text-lg">
        ✅ Compra realizada con éxito
    </div>

    <div class="flex justify-center items-center min-h-screen">
        <div class="bg-white shadow-lg rounded-lg p-10 w-full max-w-2xl text-center">
            <h2 class="text-green-700 font-bold text-2xl">¡Felicidades! Tu pedido ya está confirmado</h2>
            <p class="text-gray-600 text-md mt-4">Puedes seguir agregando productos mientras el tiempo límite de captura no finalice.</p>

            <div class="mt-6 border-t border-gray-300 pt-4 text-left">
                @php $totalCarrito = 0; @endphp
                @forelse ($itemsCarrito as $item)
                    @php
                        $subtotal = $item->price * $item->quantity;
                        $totalCarrito += $subtotal;
                    @endphp
                    <div class="py-2">
                        <p class="text-lg font-semibold text-green-700">{{ $item->name }}</p>
                        <p class="text-sm text-gray-600">Cantidad: <span class="font-semibold">{{ $item->quantity }} kg</span></p>
                        <p class="text-sm text-gray-700 font-semibold">Precio unitario: ${{ number_format($item->price, 2) }} MXN</p>
                        <p class="text-md font-bold text-green-800 mt-1">Subtotal: ${{ number_format($subtotal, 2) }} MXN</p>
                    </div>
                @empty
                    <p class="text-gray-500 text-center py-4">No hay productos en el carrito.</p>
                @endforelse
            </div>

            <div class="bg-green-100 text-green-700 font-bold text-2xl py-4 rounded-md mt-6">
                Importe a pagar: ${{ number_format($totalCarrito, 2) }} MXN
            </div>

            <form action="{{ route('pago.procesar') }}" method="POST">
                @csrf
                <button type="submit" class="bg-green-600 text-white font-bold py-3 px-8 rounded-md mt-6 text-lg hover:bg-green-700">
                    FINALIZAR
                </button>
            </form>
        </div>
    </div>

</body>

</html>