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
            
            $table->foreignId('programa_formacion_id')->constrained('programas_formacion')->cascadeOnDelete();
            $table->foreignId('trimestre_id')->constrained('trimestres')->cascadeOnDelete();
            $table->foreignId('resultado_aprendizaje_id')->constrained('resultados_aprendizaje')->cascadeOnDelete();

            $table->unsignedInteger("horas_programadas");
            $table->unsignedSmallInteger("orden");

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("mallas_trimestrales");
    }
};
