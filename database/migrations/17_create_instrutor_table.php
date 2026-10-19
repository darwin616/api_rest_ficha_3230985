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
        Schema::create('instructores', function (Blueprint $table) {
            $table->id(); // llave primaria, con el nombre de id, biginteger
            $table->string("nombre",80);
            $table->string("apellidos",80);
            $table->string("telefono",20);
            $table->string("correo",150)->unique();
            $table->unsigneBigInteger("usuario_id");
            $table->unsigneBigInteger("centro_id");
            $table->unsigneBigInteger("tipo_vinculacion_id");
            $table->unsigneBigInteger("especialidades_id");
            $table->unsigneBigInteger("competencia_id");
            $table->bool("activo");
            
            $table->timestamps(); // crea dos campos cuando se creo y cuando se actualizo
            $table->softDeletes(); //borrador

            $table->foreign("centro_id")->references("id")->on("centros")->onDelete("cascade");
            $table->foreign("usuario_id")->references("id")->on("usuarios")->onDelete("cascade");
            $table->foreign("tipo_vinculacion_id")->references("id")->on("tipos_vinculacion")->onDelete("cascade");
            $table->foreign("especialidades_id")->references("id")->on("especialidades")->onDelete("cascade");
            $table->foreign("competencia_id")->references("id")->on("competencias")->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("instructores");
    }

};
Ñ