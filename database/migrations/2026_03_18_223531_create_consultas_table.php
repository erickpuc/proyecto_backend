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
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();

            //  RELACIONES (BASE DEL SISTEMA)
            $table->foreignId('cita_id')
                  ->unique()
                  ->constrained('citas')
                  ->cascadeOnDelete();

            $table->foreignId('doctor_id')
                  ->nullable()
                  ->constrained('doctores')
                  ->nullOnDelete();

            $table->foreignId('paciente_id')
                  ->nullable()
                  ->constrained('pacientes')
                  ->cascadeOnDelete();

            //  INFORMACIÓN CLÍNICA
            $table->text('motivo')->nullable(); //  agregado
            $table->text('sintomas')->nullable();
            $table->text('diagnostico')->nullable();
            $table->text('notas_clinicas')->nullable();

            //  EXTRAS MÉDICOS
            $table->string('examen')->nullable();
            $table->dateTime('fecha_tratamiento')->nullable();

            //  ESTÁNDAR LARAVEL
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
