<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Certificado</title>
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
        .certificate-card {
            border: none;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            border-radius: 15px;
            overflow: hidden;
            background: white;
        }
        .certificate-image-container {
            position: relative;
            width: 100%;
            padding: 2rem;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .certificate-image {
            max-width: 100%;
            max-height: 600px;
            width: auto;
            height: auto;
            object-fit: contain;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .certificate-image-placeholder {
            height: 400px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #e9ecef;
            color: #6c757d;
            padding: 2rem;
            border-radius: 8px;
        }
        .certificate-image-placeholder i {
            font-size: 4rem;
            margin-bottom: 1rem;
        }
        .certificate-info {
            padding: 2rem;
        }
        .info-item {
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #eee;
        }
        .info-item:last-child {
            border-bottom: none;
        }
        .info-label {
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 0.3rem;
        }
        .info-value {
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
        .certificate-title {
            color: #2c3e50;
            font-weight: bold;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 3px solid #3498db;
        }
        .image-actions {
            position: absolute;
            bottom: 1rem;
            right: 1rem;
            display: flex;
            gap: 0.5rem;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .certificate-image-container:hover .image-actions {
            opacity: 1;
        }
        .image-action-btn {
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2c3e50;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .image-action-btn:hover {
            background: white;
            transform: scale(1.1);
        }
        .action-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }
        .btn-action {
            flex: 1;
            padding: 1rem;
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        .btn-download {
            background-color: #2ecc71;
        }
        .btn-download:hover {
            background-color: #27ae60;
            transform: translateY(-2px);
        }
        .btn-share {
            background-color: #3498db;
        }
        .btn-share:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }
        .btn-verify {
            background-color: #e74c3c;
        }
        .btn-verify:hover {
            background-color: #c0392b;
            transform: translateY(-2px);
        }
        .certificate-status {
            position: absolute;
            top: 1rem;
            right: 1rem;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
        }
        .status-valid {
            background-color: #2ecc71;
            color: white;
        }
        .qr-code {
            width: 150px;
            height: 150px;
            margin: 1rem auto;
            padding: 1rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
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
        <a href="{{ route('certificados.index') }}" class="btn btn-back mb-4">
            <i class="fas fa-arrow-left me-2"></i>Volver a la lista
        </a>

        <div class="card certificate-card">
            <div class="certificate-image-container">
                @if($certificado->imagen && file_exists(public_path('images/' . $certificado->imagen)))
                    <img src="{{ asset('images/' . $certificado->imagen) }}" class="certificate-image" alt="Certificado {{ $certificado->titulo }}">
                    <div class="image-actions">
                        <a href="{{ asset('images/' . $certificado->imagen) }}" target="_blank" class="image-action-btn" title="Ver imagen en tamaño completo">
                            <i class="fas fa-expand"></i>
                        </a>
                        <a href="{{ asset('images/' . $certificado->imagen) }}" download class="image-action-btn" title="Descargar imagen">
                            <i class="fas fa-download"></i>
                        </a>
                    </div>
                    <div class="certificate-status status-valid">
                        <i class="fas fa-check-circle me-2"></i>Certificado Válido
                    </div>
                @else
                    <div class="certificate-image-placeholder">
                        <i class="fas fa-certificate"></i>
                        <p>No hay imagen disponible para este certificado</p>
                    </div>
                @endif
            </div>
            <div class="certificate-info">
                <h2 class="certificate-title">{{ $certificado->titulo }}</h2>
                
                <div class="info-item">
                    <div class="info-label">Descripción</div>
                    <div class="info-value">{{ $certificado->descripcion }}</div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="info-item">
                            <div class="info-label">Emisor</div>
                            <div class="info-value">
                                <i class="fas fa-building me-2"></i>
                                {{ $certificado->emisor }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-item">
                            <div class="info-label">Receptor</div>
                            <div class="info-value">
                                <i class="fas fa-user me-2"></i>
                                {{ $certificado->receptor }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="info-item">
                            <div class="info-label">Fecha de emisión</div>
                            <div class="info-value">
                                <i class="fas fa-calendar-alt me-2"></i>
                                {{ \Carbon\Carbon::parse($certificado->fecha_emision)->format('d/m/Y') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-item">
                            <div class="info-label">Código del certificado</div>
                            <div class="info-value">
                                <i class="fas fa-hashtag me-2"></i>
                                {{ $certificado->codigo_certificado }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center my-4">
                    <div class="qr-code">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ urlencode(route('certificados.show', $certificado->id)) }}" 
                             alt="QR Code" class="img-fluid">
                    </div>
                    <small class="text-muted">Escanea este código QR para verificar la autenticidad del certificado</small>
                </div>

                <div class="action-buttons">
                    <a href="{{ route('certificados.show', $certificado->id) }}?download=pdf" class="btn-action btn-download">
                        <i class="fas fa-file-pdf"></i>
                        Descargar PDF
                    </a>
                    <button class="btn-action btn-share" onclick="shareCertificate()">
                        <i class="fas fa-share-alt"></i>
                        Compartir
                    </button>
                    <a href="{{ route('certificados.verify', $certificado->id) }}" class="btn-action btn-verify">
                        <i class="fas fa-shield-alt"></i>
                        Verificar
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function shareCertificate() {
            if (navigator.share) {
                navigator.share({
                    title: '{{ $certificado->titulo }}',
                    text: 'Mira este certificado: {{ $certificado->descripcion }}',
                    url: window.location.href
                })
                .catch(error => console.log('Error sharing:', error));
            } else {
                // Fallback para navegadores que no soportan la API de compartir
                const dummy = document.createElement('input');
                document.body.appendChild(dummy);
                dummy.value = window.location.href;
                dummy.select();
                document.execCommand('copy');
                document.body.removeChild(dummy);
                alert('Enlace copiado al portapapeles');
            }
        }
    </script>
</body>
</html>
