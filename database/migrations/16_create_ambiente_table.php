<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up(): void {
    Schema::create('ambientes', function (Blueprint $table) 
    {
        $table->id();
        $table->unsignedBigInteger('centro_id');
        $table->unsignedBigInteger('especialidad_id');
        $table->string("codigo", 20)->unique();
        $table->string("nombre", 120);
        $table->string("tipo", 30);
        $table->unsignedSmallInteger("capacidad");
        $table->boolean("activo");
        $table->timestamps();
        $table->softDeletes();

        $table->foreign('centro_id')->references('id')->on('centros')->onDelete('cascade');
        $table->foreign('especialidad_id')->references('id')->on('especialidades')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("ambientes");
    }
};
