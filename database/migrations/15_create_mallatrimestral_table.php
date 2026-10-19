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
        Schema::create('mallas_trimestales', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("programa_formacion_id");
            $table->bigInteger("trimestre_id");
            $table->bigInteger("resultado_aprendizaje_id");
            $table->unsignedInteger("horas_programadas");
            $table->unsignedSmallInteger("orden");

            $table->timestamps();
            $table->softDeletes();

            $table->foreignId('programa_formacion_id')->references('id')->on('programas_formacion')->onDelete('cascade');
            $table->foreignId('trimestre_id')->references('id')->on('trimestres')->onDelete('cascade');
            $table->foreignId('resultado_aprendizaje_id')->references('id')->on('resultados_aprendizaje')->onDelete('cascade');

        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExist("mallas_trimestrales");
    }
};
