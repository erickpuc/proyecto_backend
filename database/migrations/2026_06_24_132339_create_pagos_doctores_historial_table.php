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
        Schema::create('pagos_doctores_historial', function (Blueprint $table) {
    $table->id();

    $table->foreignId('doctor_id')
        ->constrained('doctores')
        ->onDelete('cascade');

    $table->date('fecha_pago');

    $table->decimal('monto', 10, 2);

    $table->string('metodo_pago', 50)->nullable();

    $table->text('observaciones')->nullable();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos_doctores_historial');
    }
};
