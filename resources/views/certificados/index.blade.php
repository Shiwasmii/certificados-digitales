<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificados Digitales</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #2c3e50;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }
        .navbar-brand {
            color: white !important;
            font-weight: bold;
        }
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            background: white;
            height: 100%;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }
        .card-img-container {
            position: relative;
            width: 100%;
            padding: 1rem;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 200px;
        }
        .card-img-top {
            max-width: 100%;
            max-height: 180px;
            width: auto;
            height: auto;
            object-fit: contain;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .card-img-placeholder {
            width: 100%;
            height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #e9ecef;
            color: #6c757d;
            border-radius: 8px;
        }
        .btn-primary {
            background-color: #3498db;
            border: none;
            padding: 8px 20px;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #2980b9;
        }
        .page-title {
            color: #2c3e50;
            font-weight: bold;
            margin-bottom: 2rem;
            text-align: center;
            position: relative;
            padding-bottom: 10px;
        }
        .page-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background-color: #3498db;
        }
        .certificate-date {
            font-size: 0.85rem;
            color: #6c757d;
        }
        .certificate-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }
        .btn-create {
            background-color: #2ecc71;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .btn-create:hover {
            background-color: #27ae60;
            transform: translateY(-2px);
        }
        .header-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        .nav-link {
            color: rgba(255,255,255,0.8) !important;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }
        .nav-link:hover {
            color: white !important;
            background-color: rgba(255,255,255,0.1);
        }
        .nav-link.active {
            color: white !important;
            background-color: rgba(255,255,255,0.2);
        }
        .search-container {
            background-color: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }
        .search-input {
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 0.8rem 1rem;
            transition: all 0.3s ease;
        }
        .search-input:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 0.2rem rgba(52,152,219,0.25);
        }
        .filter-btn {
            background-color: #f8f9fa;
            border: 2px solid #e9ecef;
            color: #6c757d;
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .filter-btn:hover {
            background-color: #e9ecef;
            border-color: #dee2e6;
        }
        .filter-btn.active {
            background-color: #3498db;
            border-color: #3498db;
            color: white;
        }
        .swiper {
            width: 100%;
            padding: 2rem 0;
        }
        .swiper-slide {
            text-align: center;
            background: white;
            border-radius: 15px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            padding: 1rem;
            transition: transform 0.3s ease;
        }
        .swiper-slide:hover {
            transform: translateY(-5px);
        }
        .swiper-button-next,
        .swiper-button-prev {
            color: #3498db;
        }
        .swiper-pagination-bullet-active {
            background: #3498db;
        }
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }
        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 15px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            text-align: center;
        }
        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: #3498db;
            margin-bottom: 0.5rem;
        }
        .stat-label {
            color: #6c757d;
            font-size: 0.9rem;
        }
        .filters-section {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .form-select {
            border: 1px solid #dee2e6;
            border-radius: 6px;
            padding: 0.5rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        .form-select:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,0.25);
        }
        .certificate-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .certificate-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .certificate-image-container {
            height: 200px;
            overflow: hidden;
            position: relative;
        }
        .certificate-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        .certificate-card:hover .certificate-image {
            transform: scale(1.05);
        }
        .card-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #2c3e50;
        }
        .card-text {
            font-size: 0.9rem;
            line-height: 1.4;
        }
        .btn-primary {
            width: 100%;
            margin-top: 1rem;
            background-color: #3498db;
            border: none;
            padding: 0.5rem 1rem;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #2980b9;
        }
        .pagination {
            margin-top: 2rem;
        }
        .page-item.active .page-link {
            background-color: #3498db;
            border-color: #3498db;
        }
        .page-link {
            color: #3498db;
        }
        .page-link:hover {
            color: #2980b9;
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('certificados.index') }}">
                            <i class="fas fa-home me-2"></i>Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('certificados.create') }}">
                            <i class="fas fa-plus me-2"></i>Nuevo Certificado
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-chart-bar me-2"></i>Estadísticas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-cog me-2"></i>Configuración
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        <!-- Estadísticas -->
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-number">{{ $certificados->count() }}</div>
                <div class="stat-label">Total de Certificados</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $certificados->where('fecha_emision', '>=', now()->subDays(30))->count() }}</div>
                <div class="stat-label">Certificados este mes</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $certificados->unique('emisor')->count() }}</div>
                <div class="stat-label">Emisores únicos</div>
            </div>
        </div>

        <!-- Filtros y Búsqueda -->
        <div class="filters-section mb-4">
            <form action="{{ route('certificados.index') }}" method="GET" class="row g-3 align-items-center">
                <div class="col-md-6">
                    <select name="categoria" class="form-select" onchange="this.form.submit()">
                        <option value="">Todas las categorías</option>
                        @foreach($categoriasExistentes as $categoria)
                            <option value="{{ $categoria }}" {{ request('categoria') == $categoria ? 'selected' : '' }}>
                                {{ $categoria }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>

        <!-- Grid de Certificados -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse($certificados as $certificado)
                <div class="col">
                    <div class="card h-100 certificate-card">
                        <div class="card-img-container">
                            <img src="{{ asset('images/' . $certificado->imagen) }}" 
                                 class="card-img-top" 
                                 alt="{{ $certificado->titulo }}">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $certificado->titulo }}</h5>
                            <p class="card-text text-muted">
                                <small>
                                    <i class="fas fa-building"></i> {{ $certificado->emisor }}<br>
                                    <i class="fas fa-user"></i> {{ $certificado->receptor }}<br>
                                    <i class="fas fa-calendar"></i> {{ $certificado->fecha_emision->format('d/m/Y') }}
                                </small>
                            </p>
                            <a href="{{ route('certificados.show', $certificado) }}" class="btn btn-primary">
                                Ver Detalles
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">
                        No se encontraron certificados.
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Paginación -->
        @if(request('categoria'))
            <div class="d-flex justify-content-center mt-4">
                {{ $certificados->links() }}
            </div>
        @endif

        <div class="header-actions">
            <h1 class="page-title mb-0">Lista de Certificados Digitales</h1>
            <a href="{{ route('certificados.create') }}" class="btn btn-create">
                <i class="fas fa-plus me-2"></i>Nuevo Certificado
            </a>
        </div>
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        // Inicializar Swiper
        const swiper = new Swiper('.swiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            },
        });

        // Filtros
        document.querySelectorAll('.filter-btn').forEach(button => {
            button.addEventListener('click', function() {
                document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                // Aquí puedes agregar la lógica de filtrado
            });
        });
    </script>
</body>
</html>
