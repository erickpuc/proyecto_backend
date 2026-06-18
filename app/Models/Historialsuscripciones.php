<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historialsuscripciones extends Model
{
    protected $table = 'historial_suscripciones';

    public $timestamps = false;

    protected $fillable = [
        'suscripcion_id',
        'previous_plan_id',
        'new_plan_id',
        'changed_type',
        'created_at'
    ];


        public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'usuario_id');
    }

    public function suscripcion()
    {
        return $this->belongsTo(Suscripciones::class, 'suscripcion_id');
    }

    public function plan()
    {
        return $this->belongsTo(Planes::class, 'plan_id');
    }
}