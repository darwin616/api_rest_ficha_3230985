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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("rol_id");
            $table->string("nombre",150);
            $table->string("correo",150)->unique();
            $table->string("password");
            $table->bool("activo");
            $table->timestamps();
            $table->softDeletes();
            $table->foreign("rol_id")->references("id")->on(roles)->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("usuarios");
}

};