<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AltaPaciente;
class Consulta extends Model
{
    protected $table = 'consultas';

    protected $fillable = [
        'paciente_id',
        'motivo',
        'sintomas',
        'notas',
        'examen',
        'fecha_tratamiento'
    ];

    public function paciente()
    {
        return $this->belongsTo(AltaPaciente::class);
    }
}