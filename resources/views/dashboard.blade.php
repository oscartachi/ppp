<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-green-700 dark:text-green-400 leading-tight">
            {{ __('Bienvenido a AgroClick') }}
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-bold mb-4">{{ __("Compra los mejores productos agrícolas") }}</h3>
                    <p class="mb-6">
                        {{ __("Explora nuestra amplia variedad de productos frescos y de alta calidad, directo del campo a tu hogar. ¡Encuentra todo lo que necesitas para tus proyectos agrícolas!") }}
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Producto 1 -->
                        <div class="bg-gray-100 dark:bg-gray-700 rounded-lg shadow p-4">
                            <h4 class="text-lg font-bold text-green-600 dark:text-green-300">{{ __("Tomates Orgánicos") }}</h4>
                            <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">{{ __("Frescos y cultivados sin químicos.") }}</p>
                            <p class="mt-4 font-bold text-green-700 dark:text-green-400">{{ __("Precio: $50 MXN/kg") }}</p>
                            <a href="#" class="inline-block mt-4 px-4 py-2 bg-green-600 text-white font-semibold rounded hover:bg-green-700 focus:ring focus:ring-green-300">
                                {{ __("Añadir al Carrito") }}
                            </a>
                        </div>

                        <!-- Producto 2 -->
                        <div class="bg-gray-100 dark:bg-gray-700 rounded-lg shadow p-4">
                            <h4 class="text-lg font-bold text-green-600 dark:text-green-300">{{ __("Maíz Amarillo") }}</h4>
                            <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">{{ __("Perfecto para tortillas y más.") }}</p>
                            <p class="mt-4 font-bold text-green-700 dark:text-green-400">{{ __("Precio: $25 MXN/kg") }}</p>
                            <a href="#" class="inline-block mt-4 px-4 py-2 bg-green-600 text-white font-semibold rounded hover:bg-green-700 focus:ring focus:ring-green-300">
                                {{ __("Añadir al Carrito") }}
                            </a>
                        </div>

                        <!-- Producto 3 -->
                        <div class="bg-gray-100 dark:bg-gray-700 rounded-lg shadow p-4">
                            <h4 class="text-lg font-bold text-green-600 dark:text-green-300">{{ __("Papas Frescas") }}</h4>
                            <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">{{ __("Directo del campo a tu mesa.") }}</p>
                            <p class="mt-4 font-bold text-green-700 dark:text-green-400">{{ __("Precio: $40 MXN/kg") }}</p>
                            <a href="#" class="inline-block mt-4 px-4 py-2 bg-green-600 text-white font-semibold rounded hover:bg-green-700 focus:ring focus:ring-green-300">
                                {{ __("Añadir al Carrito") }}
                            </a>
                        </div>
                    </div>
                    <a href="{{ route('products.index') }}" class="inline-block mt-8 px-6 py-3 bg-blue-600 text-white font-bold rounded hover:bg-blue-700 focus:ring focus:ring-blue-300">
                        {{ __("Explorar Más Productos") }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container"> 
     <br>
      

    <div class="   b bnb ">
        
</x-app-layout>
