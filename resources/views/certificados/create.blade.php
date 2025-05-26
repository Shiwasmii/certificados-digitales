<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Certificado</title>
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
        .form-card {
            border: none;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            border-radius: 15px;
            background: white;
        }
        .form-title {
            color: #2c3e50;
            font-weight: bold;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 3px solid #3498db;
        }
        .image-preview {
            width: 100%;
            height: 200px;
            border: 2px dashed #dee2e6;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .image-preview:hover {
            border-color: #3498db;
            background-color: #e9ecef;
        }
        .image-preview img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }
        .image-preview-text {
            color: #6c757d;
            text-align: center;
        }
        .image-preview-text i {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }
        .btn-primary {
            background-color: #3498db;
            border: none;
            padding: 10px 25px;
        }
        .btn-primary:hover {
            background-color: #2980b9;
        }
        .btn-secondary {
            background-color: #6c757d;
            border: none;
            padding: 10px 25px;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card form-card">
                    <div class="card-body p-4">
                        <h2 class="form-title">Agregar Nuevo Certificado</h2>

                        <form action="{{ route('certificados.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="mb-4">
                                <label for="imagen" class="form-label">Imagen del Certificado</label>
                                <div class="image-preview" id="imagePreview">
                                    <div class="image-preview-text">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        <p>Haz clic para seleccionar una imagen</p>
                                        <small class="text-muted">Formatos permitidos: JPG, PNG, WEBP</small>
                                    </div>
                                </div>
                                <input type="file" class="d-none" id="imagen" name="imagen" accept="image/*" required>
                                @error('imagen')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="titulo" class="form-label">Título</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" required>
                                @error('titulo')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                                @error('descripcion')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="emisor" class="form-label">Emisor</label>
                                    <input type="text" class="form-control" id="emisor" name="emisor" required>
                                    @error('emisor')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="receptor" class="form-label">Receptor</label>
                                    <input type="text" class="form-control" id="receptor" name="receptor" required>
                                    @error('receptor')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="fecha_emision" class="form-label">Fecha de Emisión</label>
                                    <input type="date" class="form-control" id="fecha_emision" name="fecha_emision" required>
                                    @error('fecha_emision')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="codigo_certificado" class="form-label">Código del Certificado</label>
                                    <input type="text" class="form-control" id="codigo_certificado" name="codigo_certificado" required>
                                    @error('codigo_certificado')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('certificados.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>Cancelar
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Guardar Certificado
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Previsualización de la imagen
        const imagePreview = document.getElementById('imagePreview');
        const imageInput = document.getElementById('imagen');

        imagePreview.addEventListener('click', () => {
            imageInput.click();
        });

        imageInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.innerHTML = `<img src="${e.target.result}" alt="Vista previa">`;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html> 