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
        Schema::create('competencias', function (Blueprint $table) {
            $table-> id();
            $table->unsignedBigInteger("programa_formacion_id");
            $table->string("codigo",20)->unique();
            $table->string("nombre",255);
            $table->unsignedInteger("horas");
            $table->foreing("programa_formacion_id")-> references ("id") -> on("programa_formacion")-> ondelete ("cascade");
      
            $table-> timestamps();  
            $table-> softDeletes();


            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("competencias");
    }
};
