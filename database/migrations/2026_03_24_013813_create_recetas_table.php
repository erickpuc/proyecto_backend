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
Schema::create('recetas', function (Blueprint $table) {
    $table->id();
    $table->foreignId('consulta_id')->nullable()->constrained('consultas');
    $table->foreignId('doctor_id')->nullable()->constrained('doctores');
    $table->foreignId('paciente_id')->nullable()->constrained('pacientes');
    $table->foreignId('farmacia_id')->nullable()->constrained('farmacias');
    $table->string('estado', 20)->nullable();
    $table->timestamp('creado_en')->nullable();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recetas');
    }
};
