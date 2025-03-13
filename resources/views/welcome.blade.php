wecome <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroClick - Bienvenido</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    @include('components.navbar')

    <header class="bg-green-700 text-white text-center py-10 shadow-lg">
        <h1 class="text-4xl font-extrabold">🌿 Bienvenido a AgroClick</h1>
        <p class="mt-2 text-lg">Tu tienda de productos frescos, directo del campo a tu hogar.</p>
    </header>

    <div class="py-8 container mx-auto px-4">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Explora nuestros productos</h2>

        <!-- Grid de productos -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($productos as $producto)
                <div class="bg-white rounded-lg shadow-md p-5 border border-gray-300">
                    <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="w-full h-40 object-cover rounded-md border">
                    
                    <h3 class="text-lg font-bold text-green-700 mt-2">{{ $producto->nombre }}</h3>
                    <p class="text-gray-600 text-sm">{{ $producto->descripcion }}</p>
                    <p class="text-green-700 font-bold mt-2 text-lg">${{ $producto->precio }} MXN/kg</p>
                    <p class="text-gray-500 text-sm mt-2">Publicado por: {{ $producto->user->name ?? 'Usuario desconocido' }}</p>

                    @guest
                        <p class="text-red-500 font-bold mt-3">Inicia sesión para comprar</p>
                        <a href="{{ route('login') }}" class="block mt-2 text-center bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                            Iniciar Sesión
                        </a>
                    @endguest
                </div>
            @endforeach
        </div>

        <!-- Paginación -->
        <div class="mt-6">
            {{ $productos->links() }}
        </div>
    </div>
</body>
</html>