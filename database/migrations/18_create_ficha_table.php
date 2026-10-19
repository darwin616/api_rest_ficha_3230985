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
            $table->unsignedBigInter("centro_id"); 
            $table->unsignedBigInter("programa_formacion_id");
            $table->unsignedBingInter("jornada_id");

            $table->string("numero", 20)->unique();
            $table->date("fecha_inicio");
            $table->date("fecha_fin");
            $table->integer("cupo");
            $table->string("estado", 30);
            $table->timestamps();
            $table->softDeletes();

            $tables->foreign("centro_id")->references("id")->on("centros")->onDelete("cascade");
            $tables->foreign("programa_formacion_id")->references("id")->on("programas_formacion")->onDelete("cascade");
            $tables->foreign("jornada_id")->references("id")->on("jornadas")->onDelete("cascade");
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
