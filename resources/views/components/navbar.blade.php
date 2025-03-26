<nav class="bg-white border-b border-gray-300 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- LOGO -->
            <div class="flex items-center">
                <a href="{{ route('productos.index') }}" class="text-2xl font-bold text-green-700">
                    🌿 AgroClick
                </a>
            </div>

            <!-- ENLACES DE NAVEGACIÓN (DESKTOP) -->
            <div class="hidden md:flex items-center space-x-6">
            <a href="{{ route('productos.mis_productos') }}" class="text-gray-700 hover:text-green-700 font-semibold">
            🛍️ Mis Productos
         </a>
                <a href="{{ route('carrito.index') }}" class="text-gray-700 hover:text-green-700 font-semibold">
                    🛒 Carrito
                </a>
                <a href="{{ route('historial') }}" class="text-gray-700 hover:text-green-600">📜 Historial de Compras</a>
                
                <a href="{{ route('productos.create') }}" class="text-gray-700 hover:text-green-700 font-semibold">
                    ➕ Agregar Producto
                </a>
                @auth
                    <span class="text-gray-800 font-semibold">
                        👤 {{ Auth::user()->name }}
                    </span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-red-500 font-semibold hover:underline">
                            🚪 Cerrar Sesión
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-blue-500 font-semibold hover:underline">
                        🔑 Iniciar Sesión
                    </a>
                @endauth
            </div>

            <!-- BOTÓN MENÚ RESPONSIVO (MOBILE) -->
            <div class="md:hidden flex items-center">
                <button id="menu-btn" class="focus:outline-none">
                    <svg class="h-8 w-8 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

    </div>
</nav>

<!-- SCRIPT PARA ABRIR/CERRAR EL MENÚ RESPONSIVO -->
<script>
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>