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
        Schema::create('doctor_consultorios', function (Blueprint $table) {
    $table->id();

    $table->foreignId('doctor_id')
        ->constrained('doctores')
        ->onDelete('cascade');

    $table->foreignId('consultorio_id')
        ->constrained('consultorios')
        ->onDelete('cascade');

    $table->date('fecha_inicio')->nullable();
    $table->date('fecha_fin')->nullable();

    $table->boolean('activo')->default(true);

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_consultorios');
    }
};
