<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('historial_suscripciones', function (Blueprint $table) {
            $table->id();

            $table->foreignId('suscripcion_id')
                ->constrained('suscripciones');

            $table->foreignId('previous_plan_id')
                ->nullable()
                ->constrained('planes');

            $table->foreignId('new_plan_id')
                ->nullable()
                ->constrained('planes');

            $table->string('changed_type', 50);

            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historial_suscripciones');
    }
};