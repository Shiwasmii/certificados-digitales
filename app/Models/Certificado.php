<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificado extends Model
{
    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'emisor',
        'receptor',
        'fecha_emision',
        'codigo_certificado'
    ];

    protected $casts = [
        'fecha_emision' => 'date'
    ];
}
