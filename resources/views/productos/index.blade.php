<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
@include('components.navbar')
<body class="bg-gray-100">
    <header class="bg-green-700 text-white text-center py-10 md:py-14 shadow-lg">
        <h1 class="text-3xl md:text-5xl font-extrabold tracking-wide">🌿Bienvenido a AgroClick</h1>
        <p class="mt-2 text-md md:text-lg font-light">Tu tienda de productos frescos, directo del campo a tu hogar.</p>
    </header>

    <div class="py-8 md:py-12 flex flex-col items-center">
        <div class="max-w-7xl w-full px-6">
           

            <!-- Barra de búsqueda -->
            <div class="mb-6 flex justify-center">
                <input 
                    type="text" 
                    id="searchInput" 
                    placeholder="Buscar productos..." 
                    class="w-full max-w-lg px-4 py-2 border border-green-500 rounded-lg shadow-sm focus:ring-2 focus:ring-green-700 focus:outline-none"
                    onkeyup="filterProducts()"
                >
            </div>

            <!-- Grid de Productos -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" id="productList">
                @foreach ($productos as $producto)
                    <div class="bg-white rounded-lg shadow-lg p-5 flex flex-col items-center text-center border-4 border-green-500 product-card">
                        @if ($producto->imagen)
                            <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="w-full max-w-[180px] h-40 object-cover rounded-md border-2 border-gray-300 shadow-md">
                        @else
                            <img src="https://via.placeholder.com/150" alt="Imagen por defecto" class="w-full max-w-[180px] h-40 object-cover rounded-md border-2 border-gray-300 shadow-md">
                        @endif
                        <h2 class="text-lg font-bold text-green-700 mt-3 product-name">{{ $producto->nombre }}</h2>
                        <p class="text-gray-600 text-sm">{{ $producto->descripcion }}</p>
                        <p class="text-green-700 font-bold mt-2 text-lg">${{ $producto->precio }} MXN/kg</p>
                        
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