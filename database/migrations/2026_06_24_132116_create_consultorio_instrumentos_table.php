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
        Schema::create('consultorio_instrumentos', function (Blueprint $table) {
    $table->id();

    $table->foreignId('consultorio_id')
        ->constrained('consultorios');

    $table->foreignId('instrumento_id')
        ->constrained('instrumentos_medicos');

    $table->integer('cantidad')->default(1);

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultorio_instrumentos');
    }
};
