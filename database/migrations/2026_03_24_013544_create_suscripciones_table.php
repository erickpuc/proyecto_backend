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
Schema::create('suscripciones', function (Blueprint $table) {
    $table->id();
    $table->foreignId('usuario_id')->nullable()->constrained('usuarios');
    $table->foreignId('plan_id')->nullable()->constrained('planes');
    $table->string('estado', 20)->nullable();
    $table->date('fecha_inicio')->nullable();
    $table->date('fecha_fin')->nullable();
    $table->timestamp('creado_en')->nullable();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suscripciones');
    }
};
