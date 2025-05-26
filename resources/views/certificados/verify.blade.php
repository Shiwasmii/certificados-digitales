<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Certificado</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #2c3e50;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .navbar-brand {
            color: white !important;
            font-weight: bold;
        }
        .verify-card {
            border: none;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            border-radius: 15px;
            background: white;
            padding: 2rem;
        }
        .verify-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
        }
        .verify-icon.valid {
            color: #2ecc71;
        }
        .verify-icon.invalid {
            color: #e74c3c;
        }
        .verify-title {
            color: #2c3e50;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        .verify-details {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 1.5rem;
            margin-top: 2rem;
        }
        .detail-item {
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #dee2e6;
        }
        .detail-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        .detail-label {
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 0.3rem;
        }
        .detail-value {
            color: #2c3e50;
            font-size: 1.1rem;
            font-weight: 500;
        }
        .btn-back {
            background-color: #6c757d;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .btn-back:hover {
            background-color: #5a6268;
            transform: translateX(-5px);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('certificados.index') }}">
                <i class="fas fa-certificate me-2"></i>
                Certificados Digitales
            </a>
        </div>
    </nav>

    <div class="container py-4">
        <a href="{{ route('certificados.show', $certificado->id) }}" class="btn btn-back mb-4">
            <i class="fas fa-arrow-left me-2"></i>Volver al certificado
        </a>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="verify-card text-center">
                    <i class="fas fa-shield-alt verify-icon valid"></i>
                    <h2 class="verify-title">Certificado Verificado</h2>
                    <p class="text-muted">Este certificado ha sido verificado y es auténtico.</p>

                    <div class="verify-details text-start">
                        <div class="detail-item">
                            <div class="detail-label">Código de Verificación</div>
                            <div class="detail-value">{{ $certificado->codigo_certificado }}</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Título</div>
                            <div class="detail-value">{{ $certificado->titulo }}</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Emisor</div>
                            <div class="detail-value">{{ $certificado->emisor }}</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Receptor</div>
                            <div class="detail-value">{{ $certificado->receptor }}</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Fecha de Emisión</div>
                            <div class="detail-value">{{ \Carbon\Carbon::parse($certificado->fecha_emision)->format('d/m/Y') }}</div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <small class="text-muted">
                            <i class="fas fa-info-circle me-1"></i>
                            Esta verificación fue realizada el {{ now()->format('d/m/Y H:i:s') }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 