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
        Schema::create('programas_formacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('centro_id');
            $table->unsignedBigInteger('nivel_formacion_id');
            $table->unsignedBigInteger('modalidad_id');
            $table->string('codigo', 20)->unique();
            $table->string('version', 10);
            $table->string('nombre', 200);
            $table->integer('duracion_horas');
            $table->boolean('activo')->default(true);

            $table->timestamps();
            $table->softDeletes();


            $table->foreign('centro_id')->references('id')->on('centros')->onDelete('cascade');
            $table->foreign('nivel_formacion_id')->references('id')->on('niveles_formacion')->onDelete('cascade');
            $table->foreign('modalidad_id')->references('id')->on('modalidades')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programas_formacion');
    }
};