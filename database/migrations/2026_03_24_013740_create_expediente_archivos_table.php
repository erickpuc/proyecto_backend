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
Schema::create('expediente_archivos', function (Blueprint $table) {
    $table->id();
    $table->foreignId('paciente_id')->nullable()->constrained('pacientes');
    $table->foreignId('consulta_id')->nullable()->constrained('consultas');
    $table->string('nombre_archivo', 255)->nullable();
    $table->text('url_archivo')->nullable();
    $table->string('tipo', 50)->nullable();
    $table->timestamp('creado_en')->nullable();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expediente_archivos');
    }
};
