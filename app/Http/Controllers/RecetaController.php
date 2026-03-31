<?php
namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RecetaController extends Controller
{
public function recetas()
{
    return response()->json(
        Receta::all()
    );
}

public function index(Request $request)
{
    $farmaciaId = $request->farmacia_id;

    $query = Receta::with([
        'paciente.usuario',
        'detalles.medicamento' // AQUI ESTÁ LA MAGIA
    ])
    ->where('farmacia_id', $farmaciaId);

    $recetas = $query->orderBy('creado_en', 'desc')
        ->paginate(5);

    return response()->json($recetas);
}

    // STATS (opcional pero recomendado)
    public function stats(Request $request)
    {
        $farmaciaId = $request->farmacia_id;

        $base = Receta::where('farmacia_id', $farmaciaId)
            ->whereDate('creado_en', Carbon::today());

        return response()->json([
            'total' => $base->count(),
            'pendientes' => (clone $base)->where('estado', 'pendiente')->count(),
            'entregadas' => (clone $base)->where('estado', 'entregada')->count(),
        ]);
    }
}