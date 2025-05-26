<?php

use App\Http\Controllers\CertificadoController;

Route::get('/', [CertificadoController::class, 'index'])->name('certificados.index'); // Lista
Route::get('/certificados/create', [CertificadoController::class, 'create'])->name('certificados.create');
Route::post('/certificados', [CertificadoController::class, 'store'])->name('certificados.store');
Route::get('/certificados/{id}', [CertificadoController::class, 'show'])->name('certificados.show'); // Detalle
Route::get('/certificados/{id}/verify', [CertificadoController::class, 'verify'])->name('certificados.verify');


