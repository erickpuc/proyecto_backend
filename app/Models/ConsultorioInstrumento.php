<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultorioInstrumento extends Model
{
    protected $table = "consultorio_instrumentos";

    protected $fillable = [
        'consultorio_id',
        'instrumento_id',
        'cantidad'
    ];
}