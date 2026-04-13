<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Planes extends Model
{
    protected $table = 'planes';
    protected $primaryKey = "id";
    public $timestamps = false;



    protected $fillable = [
        'nombre',
        'precio',
        'duracion_dias',
    ];

    public function suscripciones()
{
    return $this->hasMany(Suscripciones::class, 'plan_id');
}
}
