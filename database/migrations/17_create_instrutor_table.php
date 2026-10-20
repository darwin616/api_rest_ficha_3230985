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
        Schema::create('instructores', function (Blueprint $table) {
            $table->id();

            $table->string('nombre', 80);
            $table->string('apellidos', 80);
            $table->string('telefono', 20);
            $table->string('correo', 150)->unique();

            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('centro_id');
            $table->unsignedBigInteger('tipo_vinculacion_id');
            $table->unsignedBigInteger('especialidades_id');
            $table->unsignedBigInteger('competencia_id');

            $table->boolean('activo')->default(true);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('centro_id')->references('id')->on('centros')->onDelete('cascade');
            $table->foreign('tipo_vinculacion_id')->references('id')->on('tipos_vinculacion')->onDelete('cascade');
            $table->foreign('especialidades_id')->references('id')->on('especialidades')->onDelete('cascade');
            $table->foreign('competencia_id')->references('id')->on('competencias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructores');
    }
};