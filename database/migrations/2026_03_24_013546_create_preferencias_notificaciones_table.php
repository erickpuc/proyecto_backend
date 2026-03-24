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
Schema::create('preferencias_notificaciones', function (Blueprint $table) {
    $table->id();
    $table->foreignId('usuario_id')->unique()->constrained('usuarios');
    $table->boolean('whatsapp')->default(true);
    $table->boolean('laboratorio')->default(true);
    $table->boolean('boletin')->default(false);
    $table->boolean('promociones')->default(false);
    $table->timestamp('actualizado_en')->nullable();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preferencias_notificaciones');
    }
};
