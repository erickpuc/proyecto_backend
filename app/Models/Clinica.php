<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clinica extends Model
{
    protected $table = 'clinicas';

    protected $fillable = [
        'usuario_id',
        'nombre',
        'direccion',
        'ciudad',
        'estado',
        'pais',
        'telefono'
    ];

    public $timestamps = false;

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function farmacias()
    {
        return $this->hasMany(Farmacia::class);
    }
}