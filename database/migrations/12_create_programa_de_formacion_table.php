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
        Schema::create('programa_de_formacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("centro_id");
            $table->unsignedBigInteger("nivel_formacion_id");
            $table->unsignedBigInteger("modalidad_id");

            $table->string("codigo", 20)->unique();
            $table->string("version", 10);
            $table->string("nombre", 200);
            $table->integer("duracion_horas",);
            $table->bool();
            $table->timestamps();
            $table->softDeletes();



            $table->foreing("centro_id")->references("id")->on("centros")->onDelete("cascade");
            $table->foreing("nivel_de_formacion_id")->references("id")->on("niveles_formacion")->onDelete("cascade");
            $table->foreing("modalidad")->references("id")->on("modalidades")->onDelete("cascade");



            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema:: dropIFxists("programa_de_formacion");
    }
};