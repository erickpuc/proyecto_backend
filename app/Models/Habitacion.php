<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $table = "habitaciones";

    protected $fillable = [
        'clinica_id',
        'nombre',
        'numero',
        'piso',
        'tipo',
        'estado',
        'descripcion',
        'activo'
    ];
}