<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suscripciones extends Model
{
    protected $table = 'suscripciones';
    protected $primaryKey = "id";
    public $timestamps = false;



    protected $fillable = [
        'usuario_id',
        'plan_id',
        'estado',
        'fecha_inicio',
        'fecha_fin'

    ];

    public function usuario()
{
    return $this->belongsTo(Usuario::class, 'usuario_id');
}

public function plan()
{
    return $this->belongsTo(Planes::class, 'plan_id');
}
}
