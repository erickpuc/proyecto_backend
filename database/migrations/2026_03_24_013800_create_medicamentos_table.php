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
Schema::create('medicamentos', function (Blueprint $table) {
    $table->id();
    $table->string('nombre', 150);
    $table->string('sustancia_activa', 150)->nullable();
    $table->string('concentracion', 50)->nullable();
    $table->string('unidad', 20)->nullable();
    $table->string('presentacion', 100)->nullable();
    $table->integer('cantidad_presentacion')->nullable();
    $table->boolean('requiere_receta')->default(false);
    $table->text('descripcion_general')->nullable();
    $table->text('imagen_url')->nullable();
    $table->foreignId('categoria_id')->nullable()->constrained('categorias_medicamentos');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicamentos');
    }
};
