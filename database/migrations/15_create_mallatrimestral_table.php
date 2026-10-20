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
        Schema::create('mallas_trimestrales', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('programa_formacion_id');
            $table->unsignedBigInteger('trimestre_id');
            $table->unsignedBigInteger('resultado_aprendizaje_id');
            $table->unsignedInteger('horas_programadas');
            $table->unsignedInteger('orden');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('programa_formacion_id')->references('id')->on('programas_formacion')->onDelete('cascade');
            $table->foreign('trimestre_id')->references('id')->on('trimestres')->onDelete('cascade');
            $table->foreign('resultado_aprendizaje_id')->references('id')->on('resultados_aprendizaje')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mallas_trimestrales');
    }
};