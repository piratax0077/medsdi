<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contadores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_asistente_tipo')->nullable();
            $table->string('rut', 12);
            $table->string('nombres', 100);
            $table->string('apellido_uno', 50);
            $table->string('apellido_dos', 50)->nullable();
            $table->string('telefono_uno', 20);
            $table->string('telefono_dos', 20)->nullable();
            $table->char('sexo', 1)->nullable();
            $table->string('email', 200);
            $table->string('foto_perfil', 100)->nullable();
            $table->string('bienvenido', 255)->default(0);
            $table->date('fecha_nac')->nullable();
            $table->unsignedBigInteger('id_premium')->nullable();
            $table->string('id_tipo_asistente', 255)->nullable();
            $table->unsignedBigInteger('id_direccion')->nullable();
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->integer('buscador')->nullable();
            $table->unsignedBigInteger('id_modalidad')->nullable();
            $table->string('curriculum', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contadores');
    }
}
