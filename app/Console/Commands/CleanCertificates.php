<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Certificado;
use Illuminate\Support\Facades\File;

class CleanCertificates extends Command
{
    protected $signature = 'certificates:clean';
    protected $description = 'Limpia todos los certificados y sus imágenes asociadas';

    public function handle()
    {
        $this->info('Limpiando certificados...');

        // Obtener todos los certificados
        $certificados = Certificado::all();

        // Eliminar las imágenes asociadas
        foreach ($certificados as $certificado) {
            if ($certificado->imagen && $certificado->imagen !== 'default-certificate.jpg') {
                $path = public_path('images/' . $certificado->imagen);
                if (File::exists($path)) {
                    File::delete($path);
                    $this->info("Imagen eliminada: {$certificado->imagen}");
                }
            }
        }

        // Eliminar todos los registros de la base de datos
        Certificado::truncate();

        $this->info('¡Certificados eliminados exitosamente!');
    }
} 