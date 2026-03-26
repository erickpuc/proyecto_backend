<?php

namespace App\Http\Controllers;
use App\Models\Consulta;
use Illuminate\Http\Request;
use App\Models\AltaPaciente;

class ConsultaController extends Controller
{
    public function addConsulta(Request $request)
{
    $validated = $request->validate([
        'paciente_id' => 'required|exists:pacientes,id',
        'cita_id' => 'required|exists:citas,id',
        'doctor_id' => 'nullable|exists:doctores,id',
        'motivo' => 'required|string',
        'sintomas' => 'nullable|string',
        'examen' => 'nullable|string',
        'notas_clinicas' => 'nullable|string',
        'fecha_tratamiento' => 'nullable|date',
    ]);

    $paciente = AltaPaciente::find($validated['paciente_id']);
    if (!$paciente) {
        return response()->json(['error' => 'Paciente no encontrado'], 404);
    }

    $consulta = Consulta::create([
        'paciente_id' => $validated['paciente_id'],
        'cita_id' => $validated['cita_id'],
        'doctor_id' => $validated['doctor_id'] ?? null,
        'motivo' => $validated['motivo'],
        'sintomas' => $validated['sintomas'] ?? null,
        'examen' => $validated['examen'] ?? null,
        'notas_clinicas' => $validated['notas_clinicas'] ?? null,
        'fecha_tratamiento' => $validated['fecha_tratamiento'] ?? null,
    ]);

    return response()->json([
        'message' => 'Consulta guardada correctamente',
        'consulta' => $consulta,
    ], 201);
}

     public function getApiConsulta() {
     // Se usa el método all para obtener todos los formularios
     // "SELECT * FROM formularios"
    $consulta = Consulta::with('paciente', 'cita', 'doctor')->get();
    return response()->json($consulta);
    }
}
