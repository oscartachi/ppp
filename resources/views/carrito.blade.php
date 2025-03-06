<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        /* Estilos generales */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffffff;
            color: #333333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #2ecc71;
            text-align: center;
            margin-bottom: 20px;
            font-size: 32px;
        }

        /* Contenedor principal */
        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #2ecc71;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        /* Tabla de productos */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th {
            background-color: #2ecc71;
            color: #ffffff;
            font-weight: 600;
            padding: 12px 8px;
            text-align: center;
        }

        table td {
            padding: 10px 8px;
            border-bottom: 1px solid #eeeeee;
            text-align: center;
        }

        table td img {
            width: 50px;
            height: 50px;
            border-radius: 5px;
        }

        table td input {
            width: 50px;
            padding: 5px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            text-align: center;
        }

        table td button {
            background-color: #ff4d4d;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 6px 8px;
            cursor: pointer;
            font-size: 14px;
        }

        table td button:hover {
            background-color: #e04343;
        }

        /* Resumen del pedido */
        .summary {
            text-align: right;
            font-size: 18px;
            font-weight: 500;
            margin-bottom: 20px;
        }

        /* Botón de finalizar compra */
        .lbl-ventana {
            background: #2ecc71;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            color: #fff;
            font-weight: bold;
            display: inline-block;
            text-align: center;
        }

        .lbl-ventana:hover {
            background: #27ae60;
        }

        /* Ventana emergente */
        .ventana {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            transition: all 500ms ease;
            opacity: 0;
            visibility: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        #btn-ventana:checked ~ .ventana {
            opacity: 1;
            visibility: visible;
        }

        .contenedor {
            width: 400px;
            height: 250px;
            background: #fff;
            box-shadow: 1px 7px 25px rgba(0, 0, 0, 0.6);
            transition: all 500ms ease;
            position: relative;
            border-radius: 10px;
            transform: translateY(-50px);
        }

        #btn-ventana:checked ~ .ventana .contenedor {
            transform: translateY(0);
        }

        .contenedor header {
            padding: 15px;
            background: #2ecc71;
            color: #fff;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .contenedor label {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            background: red;
            padding: 5px 10px;
            border-radius: 50%;
        }

        .contenido {
            padding: 20px;
            text-align: center;
        }

        .contenido h3 {
            margin-bottom: 10px;
        }

        .contenido p {
            margin-bottom: 7px;
        }

        #btn-ventana {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Carrito de Compras</h1>

        <!-- Tabla de productos -->
        <table>
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody id="cart-body">
                <tr>
                    <td><img src="https://imag.bonviveur.com/racimos-de-tomates-frescos-vendidos-como-verdura.jpg" alt="Producto"></td>
                    <td>Tomate</td>
                    <td class="precio">30.00</td>
                    <td><input type="number" value="1" min="1" class="cantidad"></td>
                    <td><button class="eliminar">✖</button></td>
                </tr>
                <tr>
                    <td><img src="https://saborusa.com.pa/imagesmg/imagenes/5ff3e6a0b703f_potatoes-food-supermarket-agriculture-JG7QGNY.jpg" alt="Producto"></td>
                    <td>Papa</td>
                    <td class="precio">45.00</td>
                    <td><input type="number" value="2" min="1" class="cantidad"></td>
                    <td><button class="eliminar">✖</button></td>
                </tr>
            </tbody>
        </table>

        <!-- Resumen del pedido -->
        <div class="summary">
            Subtotal: <strong id="subtotal">$90.00</strong><br>
            Envío: <strong id="envio">$5.00</strong><br>
            Total: <strong id="total">$95.00</strong>
        </div>

        <!-- Botón para abrir ventana emergente -->
        <input type="checkbox" id="btn-ventana">
        <label for="btn-ventana" class="lbl-ventana">Finalizar compra</label>

        <!-- Ventana emergente -->
        <div class="ventana">
            <div class="contenedor">
                <header>Compra Exitosa</header>
                <label for="btn-ventana">✖</label>
                <div class="contenido">
                    <h3>¡Gracias por tu compra!</h3>
                    <p>Tu pedido ha sido procesado con éxito.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para actualizar total y eliminar productos -->
    <script>
        function actualizarTotal() {
            let subtotal = 0;
            document.querySelectorAll("#cart-body tr").forEach(row => {
                const precio = parseFloat(row.querySelector(".precio").textContent);
                const cantidad = parseInt(row.querySelector(".cantidad").value);
                subtotal += precio * cantidad;
            });
            document.getElementById("subtotal").textContent = `$${subtotal.toFixed(2)}`;
            document.getElementById("total").textContent = `$${(subtotal + 5).toFixed(2)}`;
        }

        document.querySelectorAll(".cantidad").forEach(input => {
            input.addEventListener("input", actualizarTotal);
        });

        document.querySelectorAll(".eliminar").forEach(button => {
            button.addEventListener("click", function() {
                this.closest("tr").remove();
                actualizarTotal();
            });
        });
    </script>
</body>
</html>