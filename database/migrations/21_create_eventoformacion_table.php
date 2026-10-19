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
        Schema::create('eventos_formacion', function (Blueprint $table) {

        $table->id();
        $table->unsignedBigInteger("programacion_trimestral_id");
        $table->unsignedBigInteger("resultado_aprendizaje_id");
        $table->unsignedBigInteger("instructor_id");
        $table->unsignedBigInteger("ambiente_id");
        $table->unsignedBigInteger("dia_id");
        $table->time("hora_inicio");
        $table->time("hora_fin");
        $table->date("fecha_inicio");
        $table->date("fecha_fin");

        $table->timestamps();
        $table->softDeletes();

        $table->foreign("programacion_trimestral_id")->references("id")->on("programaciones_trimestrales")->onDelete("cascade");
        $table->foreign("resultado_aprendizaje_id")->references("id")->on("resultados_aprendizaje")->onDelete("cascade");
        $table->foreign("instructor_id")->references("id")->on("instructores")->onDelete("cascade");
        $table->foreign("ambiente_id")->references("id")->on("ambientes")->onDelete("cascade");
        $table->foreign("dia_id")->references("id")->on("dias")->onDelete("cascade");
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("eventos_formacion");
    }
};
