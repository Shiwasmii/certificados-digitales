<?php

namespace App\Http\Controllers;

use App\Models\Certificado;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class CertificadoController extends Controller
{
    public function index(Request $request)
    {
        $query = Certificado::query();

        // Búsqueda por categoría
        if ($request->has('categoria') && $request->categoria != '') {
            $categoria = $request->categoria;
            $query->where(function($q) use ($categoria) {
                $q->where('titulo', 'LIKE', "%{$categoria}%")
                  ->orWhere('descripcion', 'LIKE', "%{$categoria}%");
            });
        }

        // Si no hay categoría seleccionada, mostrar todos los certificados
        $certificados = $request->has('categoria') && $request->categoria != '' 
            ? $query->latest()->paginate(12)
            : $query->latest()->get();

        // Obtener categorías que realmente existen en los certificados
        $categoriasExistentes = [
            'Tecnología',
            'Negocios',
            'Salud',
            'Educación',
            'Arte y Diseño'
        ];

        return view('certificados.index', compact('certificados', 'categoriasExistentes'));
    }

    public function create()
    {
        return view('certificados.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'emisor' => 'required|string|max:255',
            'receptor' => 'required|string|max:255',
            'fecha_emision' => 'required|date',
        ]);

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . Str::slug($request->titulo) . '.' . $imagen->getClientOriginalExtension();
            $imagen->move(public_path('images'), $nombreImagen);
        }

        // Generar código único para el certificado
        $codigo = strtoupper(Str::random(2)) . '-' . rand(1000, 9999) . '-' . strtoupper(Str::random(2));

        Certificado::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $nombreImagen,
            'emisor' => $request->emisor,
            'receptor' => $request->receptor,
            'fecha_emision' => $request->fecha_emision,
            'codigo_certificado' => $codigo,
        ]);

        return redirect()->route('certificados.index')
            ->with('success', 'Certificado creado exitosamente.');
    }

    public function show($id)
    {
        $certificado = Certificado::findOrFail($id);

        // Si se solicita descarga PDF
        if (request('download') === 'pdf') {
            $pdf = PDF::loadView('certificados.pdf', compact('certificado'));
            $pdf->setPaper('a4', 'portrait');
            $pdf->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'defaultFont' => 'sans-serif'
            ]);
            
            return $pdf->download('certificado-' . $certificado->codigo_certificado . '.pdf');
        }

        return view('certificados.show', compact('certificado'));
    }

    public function verify($id)
    {
        $certificado = Certificado::findOrFail($id);
        return view('certificados.verify', compact('certificado'));
    }
}   
