<x-app-layout>
    <x-slot name="header">
        <div class="relative bg-[#8d4925] text-white text-center py-10 md:py-14 shadow-lg">
            <h1 class="text-3xl md:text-5xl font-extrabold tracking-wide">{{ __('Bienvenido a AgroClick') }}</h1>
            <p class="text-md md:text-lg mt-2 font-light max-w-2xl mx-auto px-4">
                {{ __('Tu tienda de productos frescos, directo del campo a tu hogar.') }}
            </p>
        </div>
    </x-slot>

    <div class="py-8 md:py-12 bg-gray-100 dark:bg-gray-900 flex flex-col items-center">
        <div class="max-w-7xl w-full px-4 md:px-8">
<br/>
            <!-- 🔍 Barra de búsqueda -->
            <div class="mb-6 flex justify-center">
                <input 
                    type="text" 
                    id="searchInput"
                    placeholder=" 🔍 Buscar productos..." 
                    class="w-full max-w-lg px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-[#8d4925] focus:outline-none"
                    onkeyup="filterProducts()"
                >
            </div>

            <!-- 🛒 Sección de Productos -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" id="productList">
                @foreach([
                    ['Tomates Orgánicos', 'https://www.ciad.mx/wp-content/uploads/2024/05/EL-CULTIVO-DE-TOMATE-EN-MEXICO-RETOS-Y-OPORTUNIDADES-FRENTE-A-ENFERMEDADES-PRODUCIDAS-POR-VIRUS-300x200.jpg', 'Frescos y cultivados sin químicos.', '50'],
                    ['Maíz Amarillo', 'https://dfinnova.com/wp-content/themes/yootheme/cache/c3/maiz_opt-c38f2941.webp', 'Perfecto para tortillas y más.', '25'],
                    ['Papas Frescas', 'https://www.superaki.mx/cdn/shop/products/0000000000147_500x600.png', 'Directo del campo a tu mesa.', '40'],
                    ['Fresas Orgánicas', 'https://cdn.pixabay.com/photo/2022/08/20/00/31/strawberries-7397925_1280.jpg', 'Dulces y 100% naturales.', '60'],
                    ['Lechuga Fresca', 'https://hydrocultura.com/cdn/shop/products/03884g_01_dragoon_1_600x.jpg?v=1659462078', 'Crujiente y lista para ensaladas.', '30'],
                    ['Zanahorias Orgánicas', 'https://resizer.glanacion.com/resizer/v2/fresh-and-sweet-carrot-on-a-grey-wooden-PPTHKVKP45FI5PDTEQS2ZVT6SY.jpg?auth=b845fea8f9f8535a894a37456674a5046fc660270cc3684d194db45aedbe7cca&width=1280&height=854&quality=70&smart=true', 'Ricas en vitaminas y sabor.', '35'],
                ] as $product)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden p-5 sm:p-6 flex flex-col items-center text-center transition-transform transform hover:scale-105 hover:shadow-2xl product-card">
                        <!-- Imagen del producto -->
                        <img src="{{ $product[1] }}" alt="{{ $product[0] }}" class="w-full max-w-[180px] h-40 object-cover rounded-md border-2 border-gray-300 shadow-md">

                        <!-- Información del producto -->
                        <h4 class="text-lg md:text-xl font-bold text-[#8d4925] mt-3 product-name">{{ __($product[0]) }}</h4>
                        <p class="text-gray-600 dark:text-gray-400 text-sm md:text-base">{{ __($product[2]) }}</p>
                        <p class="text-[#8d4925] font-bold mt-2 text-lg md:text-xl">$ {{ __($product[3]) }} MXN/kg</p>

                        <!-- Botones de Comprar y Carrito -->
                        <div class="mt-4 flex space-x-2">
                            <!-- 🛒 Añadir al carrito -->
                            <button class="px-4 py-2 bg-[#8d4925] text-white text-sm md:text-base font-semibold rounded-full shadow-lg hover:bg-[#6e3c1b] transition-all duration-600">
                                🛒 {{ __("Añadir al carrito") }}
                            </button>

                            <!-- 💳 Comprar ahora -->
                            <a href="{{ route('checkout', ['product' => $product[0]]) }}" class="px-4 py-2 bg-green-600 text-white text-sm md:text-base font-semibold rounded-full shadow-lg hover:bg-green-700 transition-all duration-600">
                                💳 {{ __("Comprar ahora") }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Botón para ver más productos -->
            <div class="text-center mt-8 md:mt-12">
                <a href="{{ route('products.index') }}" class="inline-block px-6 md:px-8 py-3 md:py-4 bg-[#8d4925] text-white text-lg md:text-xl font-bold rounded-lg shadow-lg hover:bg-[#6e3c1b] transition-all duration-300">
                    {{ __("Ver Todos los Productos") }}
                </a>
            </div>
        </div>
    </div>

    <!-- 🔍 Script para Filtrar Productos -->
    <script>
        function filterProducts() {
            let input = document.getElementById("searchInput").value.toLowerCase();
            let products = document.querySelectorAll(".product-card");

            products.forEach(product => {
                let name = product.querySelector(".product-name").textContent.toLowerCase();
                if (name.includes(input)) {
                    product.style.display = "block";
                } else {
                    product.style.display = "none";
                }
            });
        }
    </script>

</x-app-layout>