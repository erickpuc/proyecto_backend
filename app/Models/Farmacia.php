<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Farmacia extends Model
{
    protected $table = 'farmacias';

    protected $fillable = [
        'usuario_id',
        'clinica_id',
        'nombre',
        'direccion',
        'telefono'
    ];

    public $timestamps = false;

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function clinica()
    {
        return $this->belongsTo(Clinica::class);
    }
}