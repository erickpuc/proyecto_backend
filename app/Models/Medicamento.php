<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    protected $table = 'medicamentos';

    protected $fillable = [
        'nombre',
        'sustancia_activa',
        'concentracion',
        'unidad',
        'presentacion',
        'cantidad_presentacion',
        'requiere_receta',
        'descripcion_general',
        'imagen_url'
    ];

    public $timestamps = false;
}
