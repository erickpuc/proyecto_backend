<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suscripciones;
use App\Models\Planes;

class SuscripcionController extends Controller
{
    public function AddSuscripcion(Request $request)
{
    $data = $request->all();

    // Buscar el plan
    $plan = Planes::find($data['plan_id']);

    if (!$plan) {
        return response()->json([
            'error' => 'Plan no encontrado'
        ], 404);
    }

    // Desactivar suscripción anterior
    Suscripciones::where('usuario_id', $data['usuario_id'])
        ->where('estado', 'activo')
        ->update(['estado' => 'inactivo']);

    // Crear nueva suscripción
    $suscripcion = new Suscripciones();

    $suscripcion->usuario_id = $data['usuario_id'];
    $suscripcion->plan_id = $data['plan_id'];
    $suscripcion->estado = 'activo';
    $suscripcion->fecha_inicio = now();
    $suscripcion->fecha_fin = now()->addDays($plan->duracion_dias);
    $suscripcion->creado_en = now();

    $suscripcion->save();

    return response()->json([
        'message' => 'Suscripción creada',
        'suscripcion' => $suscripcion
    ]);
}






/*

    $suscripcion = Suscripciones::where('usuario_id', $usuario->id)
        ->where('estado', 'activo')
        ->whereDate('fecha_fin', '>=', now())
        ->first();

    
    if (!$suscripcion) {
        return response()->json([
            'error' => 'Tu suscripción ha expirado o no tienes plan'
        ], 403);
    }

    return response()->json([
        'message' => 'Login correcto',
        'usuario' => $usuario,
        'suscripcion' => $suscripcion
    ]);
*/


}