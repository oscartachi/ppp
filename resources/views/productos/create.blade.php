<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Navbar fija arriba -->
    <div class="fixed top-0 left-0 w-full bg-white shadow-md z-50">
        @include('components.navbar')
    </div>

    <!-- Contenedor principal -->
    <div class="flex items-center justify-center min-h-screen px-4">

        <!-- Formulario con espacio para no chocar con navbar -->
        <div class="bg-white shadow-2xl rounded-2xl p-8 w-full max-w-lg mt-32 space-y-6">

            <!-- Título -->
            <h1 class="text-3xl font-bold text-green-700 text-center">Agregar Producto</h1>

            <!-- Formulario -->
            <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf

                <!-- Campo Nombre -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Nombre:</label>
                    <input type="text" name="nombre"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        placeholder="Nombre del producto">
                </div>

                <!-- Campo Descripción -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Descripción:</label>
                    <textarea name="descripcion" rows="3"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        placeholder="Describe el producto"></textarea>
                </div>

                <!-- Campo Precio -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Precio:</label>
                    <input type="number" name="precio" step="0.01"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        placeholder="0.00">
                </div>

                <!-- Campo Imagen -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Imagen:</label>
                    <input type="file" name="imagen"
                        class="w-full border border-gray-300 rounded-xl p-2 bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>

                <!-- Campo Categoría -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Categoría:</label>
                    <select name="categoria"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <option value="frutas">🍎 Frutas</option>
                        <option value="verduras">🥦 Verduras</option>
                    </select>
                </div>

                <!-- Botón -->
                <button type="submit"
                    class="w-full py-3 bg-green-700 text-white font-bold rounded-xl shadow-md hover:bg-green-800 transition duration-300">
                    Guardar
                </button>
            </form>
        </div>

    </div>

</body>

</html>