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

        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();

            //  RELACIONES
            $table->foreignId('usuario_id')
                  ->unique()
                  ->constrained('usuarios')
                  ->cascadeOnDelete();

            $table->foreignId('doctor_id')
                  ->nullable()
                  ->constrained('doctores')
                  ->nullOnDelete();

            //  DATOS GENERALES
            $table->date('fecha_nacimiento')->nullable();
            $table->string('genero', 10)->nullable();
            $table->string('tipo_sangre', 5)->nullable();

            //  DATOS MÉDICOS
            $table->text('alergias')->nullable();
            $table->text('antecedentes')->nullable(); // heredofamiliar

            //  DIRECCIÓN COMPLETA (LO QUE FALTABA)
            $table->text('direccion')->nullable();
            $table->string('colonia')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('estado')->nullable();
            $table->string('codigo_postal')->nullable();

            //  CONTROL
            $table->boolean('activo')->default(true);

            //  ESTÁNDAR LARAVEL (CAMBIA ESTO)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
