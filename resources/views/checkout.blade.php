<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Pago</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .form-control-sm {
            width: 100%;  
        }
        .form-label {
            font-size: 0.9rem; 
        }
        .card {
            max-width: 525px;
            margin: 0 auto;
        }
        .form-group {
            display: flex;
            justify-content: center;
        }
        .form-control {
            max-width: 400px; 
        }
    </style>
</head>

<body class="d-flex flex-column justify-content-center align-items-center vh-100 bg-white">
    
    @include('components.navbar') <!-- ✅ La navbar está dentro del body ahora -->

    <h1 class="text-success mt-5 mb-5 text-center">💳 Bienvenidos a la Página de Pago</h1>
    
    <div class="card p-4 shadow">
        <h2 class="text-center text-success">Pago</h2>
        <p class="text-center text-muted">Aquí podrás procesar tu pago de manera segura.</p>
        
        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif
        
        <form id="paymentForm" method="POST" action="{{ route('pago.procesar') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nombre:</label>
                <input type="text" name="nombre" class="form-control form-control-sm" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Monto:</label>
                <input type="number" name="monto" class="form-control form-control-sm" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Número de Tarjeta:</label>
                <input type="text" name="tarjeta" class="form-control form-control-sm" placeholder="0000 0000 0000 0000" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha de Expiración:</label>
                <input type="month" name="expiracion" class="form-control form-control-sm" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Código CVV:</label>
                <input type="text" name="cvv" class="form-control form-control-sm" placeholder="123" required>
            </div>
            <button type="submit" class="btn btn-success w-100">✅ Pagar</button>
        </form>
    </div>

    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-success" id="successModalLabel">Pago Exitoso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    ¡Tu pago ha sido procesado con éxito! 🎉
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            @if(session('success'))
                var successModal = new bootstrap.Modal(document.getElementById("successModal"));
                successModal.show();
            @endif
        });
    </script>

</body>
</html>