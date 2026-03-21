<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distribuidor extends Model
{
    protected $table = 'distribuidores';

    protected $fillable = [
        'nombre',
        'rfc',
        'categoria',
        'contacto',
        'correo',
        'telefono',
        'direccion',
        'entrega',
        'ciudad',
        'pago'
    ];
}