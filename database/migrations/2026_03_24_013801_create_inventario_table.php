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
Schema::create('inventario', function (Blueprint $table) {
    $table->id();
    $table->foreignId('farmacia_id')->constrained('farmacias');
    $table->foreignId('medicamento_id')->constrained('medicamentos');
    $table->foreignId('distribuidor_id')->nullable()->constrained('distribuidores');
    $table->integer('stock')->default(0);
    $table->integer('stock_minimo')->default(5);
    $table->decimal('precio_compra', 10, 2)->nullable();
    $table->decimal('precio_venta', 10, 2)->nullable();
    $table->string('lote', 50)->nullable();
    $table->date('fecha_caducidad')->nullable();
    $table->timestamp('actualizado_en')->nullable();

    $table->unique(['farmacia_id', 'medicamento_id', 'lote'], 'inventario_idx_unique');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventario');
    }
};
