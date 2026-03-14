<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'correo',
        'telefono',
        'password',
        'rol_id',
        'activo'
    ];

    protected $hidden = [
        'password'
    ];

    public $timestamps = false;

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }
}