<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ocupacion_habitaciones', function (Blueprint $table) {
    $table->id();

    $table->foreignId('habitacion_id')
        ->nullable()
        ->constrained('habitaciones');

    $table->foreignId('paciente_id')
        ->nullable()
        ->constrained('pacientes');

    $table->dateTime('fecha_ingreso')->nullable();
    $table->dateTime('fecha_salida')->nullable();

    $table->enum('estado', [
        'Activa',
        'Alta',
        'Cancelada'
    ])->nullable();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ocupacion_habitaciones');
    }
};
