<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstrumentoMedico extends Model
{
    protected $table = "instrumentos_medicos";

    protected $fillable = [
        'clinica_id',
        'nombre',
        'categoria',
        'cantidad',
        'estado',
        'descripcion',
        'activo'
    ];
}