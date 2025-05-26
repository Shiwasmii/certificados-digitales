<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Certificado;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;

class CertificadoSeeder extends Seeder
{
    private $categorias = [
        'Tecnología' => [
            'Desarrollo Web',
            'Desarrollo Móvil',
            'Cloud Computing',
            'Ciberseguridad',
            'Inteligencia Artificial',
            'DevOps',
            'Blockchain',
            'Big Data',
            'Machine Learning',
            'IoT'
        ],
        'Negocios' => [
            'Gestión de Proyectos',
            'Marketing Digital',
            'Finanzas',
            'Emprendimiento',
            'Liderazgo',
            'Gestión de Calidad',
            'Comercio Internacional',
            'Recursos Humanos',
            'Estrategia Empresarial',
            'Innovación'
        ],
        'Salud' => [
            'Nutrición',
            'Fitness',
            'Salud Mental',
            'Primeros Auxilios',
            'Yoga',
            'Medicina Alternativa',
            'Bienestar Corporativo',
            'Coaching de Salud',
            'Terapia Física',
            'Salud Pública'
        ],
        'Educación' => [
            'Docencia',
            'E-learning',
            'Gestión Educativa',
            'Psicopedagogía',
            'Educación Especial',
            'Tecnología Educativa',
            'Diseño Curricular',
            'Evaluación Educativa',
            'Educación Inclusiva',
            'Neuroeducación'
        ],
        'Arte y Diseño' => [
            'Diseño Gráfico',
            'Diseño UX/UI',
            'Fotografía',
            'Ilustración Digital',
            'Animación',
            'Diseño de Interiores',
            'Arquitectura',
            'Diseño de Moda',
            'Diseño Industrial',
            'Arte Digital'
        ]
    ];

    private $emisores = [
        'Universidad Nacional Autónoma de México',
        'Instituto Tecnológico de Monterrey',
        'Universidad de Guadalajara',
        'Instituto Politécnico Nacional',
        'Universidad Autónoma de Nuevo León',
        'Google Cloud Platform',
        'Microsoft Azure',
        'Amazon Web Services',
        'Cisco Networking Academy',
        'Oracle Academy',
        'IBM Skills Academy',
        'Meta Developer Circles',
        'GitHub Campus Experts',
        'Mozilla Developer Network',
        'Digital Ocean Community',
        'Platzi',
        'Udemy',
        'Coursera',
        'edX',
        'LinkedIn Learning',
        'Harvard Business School Online',
        'MIT OpenCourseWare',
        'Stanford Online',
        'Yale University',
        'Berkeley Extension',
        'Instituto de Empresa',
        'ESADE Business School',
        'Tecnológico de Monterrey',
        'Universidad de los Andes',
        'Universidad de Chile'
    ];

    private $receptores = [
        'Juan Carlos Pérez González',
        'María Fernanda Rodríguez López',
        'Carlos Alberto Martínez Sánchez',
        'Ana Laura García Torres',
        'Roberto José Hernández Mendoza',
        'Laura Patricia Silva Ramírez',
        'Miguel Ángel Torres Vargas',
        'Sofía Isabel Morales Ruiz',
        'José Luis Díaz Mendoza',
        'Carmen Elena Vega Soto',
        'Ricardo Manuel Luna Pérez',
        'Diana Carolina Sánchez Torres',
        'Fernando Alejandro Ramírez Gómez',
        'Valeria Guadalupe Mendoza Ruiz',
        'Eduardo Antonio Cruz Martínez',
        'Alejandra Beatriz Vargas Soto',
        'Gabriel Ignacio Morales Luna',
        'Patricia Guadalupe Torres Díaz',
        'Roberto Carlos Sánchez Vega',
        'María del Carmen Luna Pérez'
    ];

    private $freepikUrls = [
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28095.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28096.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28097.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28098.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28099.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28100.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28101.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28102.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28103.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28104.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28105.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28106.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28107.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28108.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28109.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28110.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28111.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28112.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28113.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28114.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28115.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28116.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28117.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28118.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28119.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28120.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28121.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28122.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28123.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28124.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28125.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28126.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28127.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28128.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28129.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28130.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28131.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28132.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28133.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28134.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28135.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28136.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28137.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28138.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28139.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28140.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28141.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28142.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28143.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28144.jpg',
        'https://img.freepik.com/free-vector/certificate-template-with-golden-border_1017-28145.jpg'
    ];

    private function descargarImagen($url, $nombreArchivo)
    {
        try {
            $response = Http::get($url);
            if ($response->successful()) {
                $path = public_path('images/' . $nombreArchivo);
                File::put($path, $response->body());
                return true;
            }
        } catch (\Exception $e) {
            $this->command->error("Error al descargar la imagen: " . $e->getMessage());
        }
        return false;
    }

    private function generarTitulo($categoria, $subcategoria) {
        $tipos = [
            'Certificación Profesional en',
            'Diploma Avanzado en',
            'Certificado de Especialización en',
            'Programa de Formación en',
            'Certificación Internacional en',
            'Diploma Ejecutivo en',
            'Certificado de Maestría en',
            'Programa de Excelencia en',
            'Certificación de Competencias en',
            'Diploma de Especialista en'
        ];
        
        return $tipos[array_rand($tipos)] . ' ' . $subcategoria;
    }

    private function generarDescripcion($categoria, $subcategoria) {
        $plantillas = [
            "Por completar exitosamente el programa de especialización en {subcategoria}, demostrando competencias avanzadas y conocimientos profundos en el área.",
            "En reconocimiento a la excelencia demostrada durante el programa de {subcategoria}, destacando por su dedicación y resultados sobresalientes.",
            "Por su destacada participación y dominio en el campo de {subcategoria}, alcanzando los más altos estándares de calidad y profesionalismo.",
            "En mérito a su sobresaliente desempeño en el programa de {subcategoria}, demostrando habilidades excepcionales y compromiso con la excelencia.",
            "Por su contribución significativa al desarrollo y aplicación de conocimientos en {subcategoria}, estableciendo nuevos estándares de calidad.",
            "En reconocimiento a su liderazgo y excelencia en el campo de {subcategoria}, destacando por su innovación y visión estratégica.",
            "Por su dominio excepcional de las competencias requeridas en {subcategoria}, demostrando un nivel superior de expertise y profesionalismo.",
            "En mérito a su sobresaliente trayectoria y contribuciones al campo de {subcategoria}, estableciendo nuevos paradigmas de excelencia.",
            "Por su destacada participación en el programa avanzado de {subcategoria}, alcanzando los más altos estándares de calidad y profesionalismo.",
            "En reconocimiento a su excelencia y dedicación en el campo de {subcategoria}, demostrando un compromiso excepcional con la calidad."
        ];

        $descripcion = $plantillas[array_rand($plantillas)];
        return str_replace('{subcategoria}', $subcategoria, $descripcion);
    }

    public function run()
    {
        // Asegurarse de que el directorio images existe
        if (!File::exists(public_path('images'))) {
            File::makeDirectory(public_path('images'), 0755, true);
        }

        // Obtener todas las imágenes de la carpeta images
        $imagenes = File::files(public_path('images'));
        $imagenes = array_filter($imagenes, function($file) {
            return in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'gif']);
        });

        if (empty($imagenes)) {
            $this->command->error('No se encontraron imágenes en la carpeta images/');
            return;
        }

        // Limpiar certificados existentes
        Certificado::truncate();

        $contador = 1;
        foreach ($imagenes as $imagen) {
            $nombreImagen = pathinfo($imagen, PATHINFO_BASENAME);

            // Seleccionar categoría y subcategoría aleatoria
            $categoria = array_rand($this->categorias);
            $subcategoria = $this->categorias[$categoria][array_rand($this->categorias[$categoria])];

            // Generar fecha aleatoria en los últimos 2 años
            $fecha = Carbon::now()->subDays(rand(0, 730));

            // Generar código único
            $codigo = strtoupper(Str::random(2)) . '-' . rand(1000, 9999) . '-' . strtoupper(Str::random(2));

            // Generar título y descripción
            $titulo = $this->generarTitulo($categoria, $subcategoria);
            $descripcion = $this->generarDescripcion($categoria, $subcategoria);

            Certificado::create([
                'titulo' => $titulo,
                'descripcion' => $descripcion,
                'imagen' => $nombreImagen,
                'emisor' => $this->emisores[array_rand($this->emisores)],
                'receptor' => $this->receptores[array_rand($this->receptores)],
                'fecha_emision' => $fecha,
                'codigo_certificado' => $codigo,
            ]);

            $this->command->info("Certificado {$contador} creado con imagen: {$nombreImagen}");
            $contador++;
        }
    }
}
