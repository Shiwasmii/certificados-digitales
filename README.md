# Sistema de Certificados Digitales

Sistema web desarrollado en Laravel para la gestión y visualización de certificados digitales.

## Características

- Visualización de certificados en formato de tarjetas
- Filtrado por categorías
- Vista detallada de cada certificado
- Exportación a PDF
- Verificación de autenticidad mediante código QR
- Diseño responsivo y moderno

## Requisitos

- PHP 8.1 o superior
- Composer
- MySQL
- Servidor web (Apache/Nginx)

## Instalación

1. Clonar el repositorio:
```bash
git clone https://github.com/Shiwasmii/certificados-digitales.git
cd certificados-digitales
```

2. Instalar dependencias:
```bash
composer install
```

3. Configurar el archivo .env:
```bash
cp .env.example .env
php artisan key:generate
```

4. Configurar la base de datos en el archivo .env:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tu_base_de_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```

5. Ejecutar migraciones y seeders:
```bash
php artisan migrate
php artisan db:seed
```

6. Iniciar el servidor:
```bash
php artisan serve
```

## Uso

1. Acceder a la aplicación en `http://localhost:8000`
2. Navegar por los certificados disponibles
3. Filtrar por categorías usando el selector
4. Ver detalles de cada certificado
5. Exportar certificados a PDF
6. Verificar autenticidad mediante código QR

## Tecnologías Utilizadas

- Laravel 10
- Bootstrap 5
- Font Awesome
- MySQL
- DomPDF

## Autor

Shiwasmii

## Licencia

Este proyecto está bajo la Licencia MIT.
