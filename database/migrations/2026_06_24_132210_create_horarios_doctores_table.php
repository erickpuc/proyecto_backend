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
        Schema::create('horarios_doctores', function (Blueprint $table) {
    $table->id();

    $table->foreignId('doctor_id')
        ->constrained('doctores')
        ->onDelete('cascade');

    $table->foreignId('consultorio_id')
        ->nullable()
        ->constrained('consultorios')
        ->onDelete('cascade');

    $table->tinyInteger('dia_semana');

    $table->time('hora_inicio');
    $table->time('hora_fin');

    $table->boolean('activo')->default(true);

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios_doctores');
    }
};
