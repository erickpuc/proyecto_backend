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
Schema::create('ia_logs', function (Blueprint $table) {
    $table->id();
    $table->foreignId('usuario_id')->nullable()->constrained('usuarios');
    $table->string('tipo', 50)->nullable();
    $table->text('input_text')->nullable();
    $table->text('output_text')->nullable();
    $table->timestamp('creado_en')->nullable();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ia_logs');
    }
};
