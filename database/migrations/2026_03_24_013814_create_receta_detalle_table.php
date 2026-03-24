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
Schema::create('receta_detalle', function (Blueprint $table) {
    $table->id();
    $table->foreignId('receta_id')->nullable()->constrained('recetas');
    $table->foreignId('medicamento_id')->nullable()->constrained('medicamentos');
    $table->string('dosis', 100)->nullable();
    $table->string('frecuencia', 100)->nullable();
    $table->string('duracion', 100)->nullable();
    $table->text('instrucciones')->nullable();
    $table->timestamp('creado_en')->nullable();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receta_detalle');
    }
};
