<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AltaPaciente;
use App\Models\Cita;
use App\Models\Doctor;
class Consulta extends Model
{
    protected $table = 'consultas';

    protected $fillable = [
        'cita_id',
        'doctor_id',
        'paciente_id',
        'motivo',
        'sintomas',
        'diagnostico',
        'notas_clinicas',
        'examen',
        'fecha_tratamiento'
    ];

        //  ESTA ES LA CLAVE
    const CREATED_AT = 'creado_en';
    const UPDATED_AT = null;

    public function paciente()
    {
        return $this->belongsTo(AltaPaciente::class);
    }

    public function cita()
    {
        return $this->belongsTo(Cita::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}