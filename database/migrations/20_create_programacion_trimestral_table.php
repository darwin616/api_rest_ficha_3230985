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
        Schema::create('programaciones_trimestral', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("ficha_id");
            $table->unsignedBigInteger("trimestre_id");
            $table->string("estado", 20);

           $table->timetamps();
           $table->softDeletes();

           $table->foreign("ficha_id")->references("id")->on("fichas")->onDelete("cascade");
           $table->foreign("trimestre_id")->references("id")->on("trimestres")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programaciones_trimestral');
    }
};
