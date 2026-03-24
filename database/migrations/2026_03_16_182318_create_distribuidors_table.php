<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
Schema::create('distribuidores', function (Blueprint $table) {
    $table->id();
    $table->foreignId('farmacia_id')->constrained('farmacias');
    $table->string('nombre', 150)->nullable();
    $table->string('rfc', 20)->nullable();
    $table->string('contacto', 120)->nullable();
    $table->string('correo', 150)->nullable();
    $table->string('telefono', 20)->nullable();
    $table->text('direccion')->nullable();
    $table->string('ciudad', 80)->nullable();
    $table->boolean('activo')->default(true);
    $table->string('categoria', 255)->nullable();
    $table->timestamp('creado_en')->nullable();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distribuidors');
    }
};
