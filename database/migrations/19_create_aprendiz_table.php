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
        Schema::create('aprendices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("usuario_id")-> unique();
            $table->unsignedBigInteger("ficha_id");
            $table->string("nombres", 80);
            $table->string("apellidos", 80);
            $table->string("correo", 150)->unique();
            $table->enum("estado",["activo", "retirado", "aplazado"]);


            $table->softDeletes();
            $table->timestamps();

            $table->foreign("usuario_id")->references("id")->on("usuarios")->onDelete("cascade");
            $table->foreign("ficha_id")->references("id")->on("fichas")->onDelete("cascade");


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      
      Schema::dopIfExist("aprendices");

    }
};