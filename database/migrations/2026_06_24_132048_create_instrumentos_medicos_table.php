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
       Schema::create('instrumentos_medicos', function (Blueprint $table) {
    $table->id();

    $table->foreignId('clinica_id')
        ->constrained('clinicas');

    $table->string('nombre', 150)->nullable();
    $table->string('categoria', 100)->nullable();

    $table->integer('cantidad')->default(1);

    $table->enum('estado', [
        'Disponible',
        'En uso',
        'Mantenimiento',
        'Dañado'
    ])->default('Disponible');

    $table->text('descripcion')->nullable();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instrumentos_medicos');
    }
};
