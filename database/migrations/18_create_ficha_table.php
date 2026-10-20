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
        Schema::create('fichas', function (Blueprint $table) {
            $table->id(); // llavve primaria, con el nombre de id, bigIntger
            $table->unsignedBigInteger("centro_id"); 
            $table->unsignedBigInteger("programa_formacion_id");
            $table->unsignedBigInteger("jornada_id");

            $table->string("numero", 20)->unique();
            $table->date("fecha_inicio");
            $table->date("fecha_fin");
            $table->integer("cupo");
            $table->string("estado", 30);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign("centro_id")->references("id")->on("centros")->onDelete("cascade");
            $table->foreign("programa_formacion_id")->references("id")->on("programas_formacion")->onDelete("cascade");
            $table->foreign("jornada_id")->references("id")->on("jornadas")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    //php artisan migrate
    public function down(): void
    {
        Schema::dropIfExists("fichas");
    }
};
