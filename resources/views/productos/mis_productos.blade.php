<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Productos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    @include('components.navbar')

    <!-- Header -->
    <header class="bg-green-700 text-white text-center py-10 md:py-14 shadow-lg">
        <h1 class="text-3xl md:text-5xl font-extrabold tracking-wide">🌿 Mis Productos</h1>
        <p class="mt-2 text-md md:text-lg font-light">Administra tus productos frescos, directo del campo a la venta.</p>
    </header>

    <div class="py-10 md:py-14 flex flex-col items-center">
        <div class="max-w-7xl w-full px-6">

            <!-- Barra de búsqueda -->
            <div class="mb-8 flex justify-center">
                <input 
                    type="text" 
                    id="searchInput" 
                    placeholder="Buscar productos..." 
                    class="w-full max-w-lg px-4 py-3 border border-green-500 rounded-lg shadow-sm focus:ring-2 focus:ring-green-700 focus:outline-none"
                    onkeyup="filterProducts()"
                >
            </div>

            <!-- Grid de Productos -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8" id="productList">
                @foreach ($productos as $producto)
                    <div class="bg-white rounded-2xl shadow-lg p-6 border-4 border-green-500 hover:shadow-2xl transition-all duration-300 product-card">
                        @if ($producto->imagen)
                            <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="w-full h-40 object-cover rounded-xl mb-4 border-2 border-gray-300 shadow-md">
                        @else
                            <img src="https://via.placeholder.com/150" alt="Imagen por defecto" class="w-full h-40 object-cover rounded-xl mb-4 border-2 border-gray-300 shadow-md">
                        @endif
                        <h2 class="text-xl font-semibold text-green-700 product-name">{{ $producto->nombre ?? 'Sin nombre' }}</h2>
                        <p class="text-gray-600 mt-2 text-sm">{{ $producto->descripcion }}</p>
                        <p class="text-green-700 font-bold text-lg mt-3">${{ $producto->precio }} MXN/kg</p>
                        <p class="text-sm text-gray-500 mt-1">Publicado por: {{ $producto->user->name ?? 'Desconocido' }}</p>

                        <!-- Botones -->
                        <div class="mt-5 flex justify-between w-full">
                            <a href="{{ route('productos.edit', $producto->id) }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-xl shadow text-sm flex items-center justify-center gap-1">✏️ Editar</a>
                            
                            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-xl shadow text-sm flex items-center justify-center gap-1">🗑 Eliminar</button>
                            </form>
                        </div>

                        <!-- Agregar al carrito -->
                        <form action="{{ route('carrito.store') }}" method="POST" class="w-full mt-4">
                            @csrf
                            <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                            <div class="flex items-center justify-center mt-2">
                                <label for="cantidad-{{ $producto->id }}" class="mr-2 font-semibold">Cantidad:</label>
                                <input type="number" name="cantidad" id="cantidad-{{ $producto->id }}" value="1" min="1" class="border border-gray-300 rounded-md p-2 w-20 text-center">
                            </div>
                            <button type="submit" class="mt-4 w-full py-2 bg-green-700 text-white rounded-lg shadow-md hover:bg-green-800 transition font-semibold">
                                🛒 Agregar al Carrito
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    <!-- Script Buscador -->
    <script>
        function filterProducts() {
            let input = document.getElementById("searchInput").value.toLowerCase();
            let products = document.querySelectorAll(".product-card");
            
            products.forEach(product => {
                let name = product.querySelector(".product-name").textContent.toLowerCase();
                product.style.display = name.includes(input) ? "block" : "none";
            });
        }
    </script>
</body>
</html>
