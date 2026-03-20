<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $table = 'especialidades';

    protected $primaryKey = 'id';

    public $timestamps = false; //  CAMBIO AQUÍ

    protected $fillable = [
        'nombre'
    ];

    public function doctores()
    {
        return $this->hasMany(Doctor::class, 'especialidad_id');
    }
}