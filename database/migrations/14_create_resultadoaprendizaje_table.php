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
        Schema::create('resultados_aprendizaje', function (Blueprint $table) {
            $table->id();
            $table->bigint("competencias_id");
            $table->string("codigo", 20)->unique();
            $table->text("nombre");
            $table->unsignedInteger("horas");
            $table->timestamps();
            $table->sofDeletes();

            $table->foreing("competencias_id")->references("id")->on("competencias")->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema:: dropIfExists("resultados_aprendizaje");
            //
        
    }
};
