<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $certificado->titulo }}</title>
    <style>
        @page {
            margin: 0;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #2c3e50;
            background: #fff;
        }
        .certificate-container {
            position: relative;
            width: 100%;
            min-height: 100vh;
            padding: 2rem;
            box-sizing: border-box;
        }
        .certificate-header {
            text-align: center;
            margin-bottom: 2rem;
            padding-top: 2rem;
        }
        .certificate-title {
            font-size: 2.5rem;
            color: #2c3e50;
            margin-bottom: 1rem;
            font-weight: bold;
        }
        .certificate-subtitle {
            color: #7f8c8d;
            font-size: 1.4rem;
            margin-bottom: 2rem;
        }
        .certificate-image {
            max-width: 100%;
            height: auto;
            margin: 2rem auto;
            display: block;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .certificate-content {
            margin: 2rem 0;
            line-height: 1.8;
            font-size: 1.1rem;
            text-align: justify;
        }
        .certificate-details {
            margin: 2rem 0;
            padding: 2rem;
            background: #f8f9fa;
            border-radius: 8px;
        }
        .detail-item {
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
        }
        .detail-label {
            color: #7f8c8d;
            font-size: 1rem;
            width: 150px;
            font-weight: bold;
        }
        .detail-value {
            font-size: 1.1rem;
            color: #2c3e50;
            flex: 1;
        }
        .certificate-footer {
            margin-top: 3rem;
            text-align: center;
            padding: 2rem;
            border-top: 2px solid #3498db;
        }
        .certificate-code {
            font-family: monospace;
            font-size: 1.2rem;
            color: #3498db;
            margin: 1rem 0;
            padding: 0.5rem;
            background: #f8f9fa;
            border-radius: 4px;
            display: inline-block;
        }
        .certificate-date {
            color: #7f8c8d;
            font-size: 1rem;
            margin-top: 1rem;
        }
        .certificate-border {
            position: absolute;
            top: 20px;
            left: 20px;
            right: 20px;
            bottom: 20px;
            border: 2px solid #3498db;
            pointer-events: none;
        }
        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 5rem;
            color: rgba(52, 152, 219, 0.1);
            white-space: nowrap;
            pointer-events: none;
        }
    </style>
</head>
<body>
    <div class="certificate-container">
        <div class="certificate-border"></div>
        <div class="watermark">CERTIFICADO DIGITAL</div>
        
        <div class="certificate-header">
            <h1 class="certificate-title">{{ $certificado->titulo }}</h1>
            <div class="certificate-subtitle">Certificado Digital de Autenticidad</div>
        </div>

        @if($certificado->imagen && file_exists(public_path('images/' . $certificado->imagen)))
            <img src="{{ public_path('images/' . $certificado->imagen) }}" class="certificate-image" alt="Certificado {{ $certificado->titulo }}">
        @endif

        <div class="certificate-content">
            <p>{{ $certificado->descripcion }}</p>
        </div>

        <div class="certificate-details">
            <div class="detail-item">
                <div class="detail-label">Otorgado a:</div>
                <div class="detail-value">{{ $certificado->receptor }}</div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Emitido por:</div>
                <div class="detail-value">{{ $certificado->emisor }}</div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Fecha de emisión:</div>
                <div class="detail-value">{{ \Carbon\Carbon::parse($certificado->fecha_emision)->format('d/m/Y') }}</div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Código de verificación:</div>
                <div class="detail-value">{{ $certificado->codigo_certificado }}</div>
            </div>
        </div>

        <div class="certificate-footer">
            <div class="certificate-code">
                {{ $certificado->codigo_certificado }}
            </div>
            <div class="certificate-date">
                Para verificar la autenticidad de este certificado, visite:<br>
                {{ route('certificados.verify', $certificado->id) }}
            </div>
        </div>
    </div>
</body>
</html> 