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
       Schema::create('movimientos_inventario', function (Blueprint $table) {
    $table->id();

    $table->foreignId('inventario_id')
        ->constrained('inventario');

    $table->string('tipo', 20)->nullable();

    $table->integer('cantidad');

    $table->string('motivo', 255)->nullable();

    $table->foreignId('proveedor_id')->nullable();
    $table->foreignId('receta_id')->nullable();

    $table->foreignId('usuario_id')
        ->nullable()
        ->constrained('usuarios');

    $table->timestamp('fecha_movimiento')->nullable();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientos_inventario');
    }
};
