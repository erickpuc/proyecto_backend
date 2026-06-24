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
       Schema::create('pagos_doctores', function (Blueprint $table) {
    $table->id();

    $table->foreignId('doctor_id')
        ->constrained('doctores')
        ->onDelete('cascade');

    $table->foreignId('tipo_pago_id')
        ->constrained('tipos_pago_doctor');

    $table->decimal('salario_mensual', 10, 2)->nullable();
    $table->decimal('porcentaje_consulta', 5, 2)->nullable();
    $table->decimal('renta_mensual', 10, 2)->nullable();

    $table->text('observaciones')->nullable();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos_doctores');
    }
};
