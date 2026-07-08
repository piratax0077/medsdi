<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendedors', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('empresa')->default(0)->comment('0=persona, 1=empresa');
            $table->string('nombre')->nullable();
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->string('sexo')->nullable();
            $table->string('rut')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono_uno')->nullable();
            $table->string('telefono_dos')->nullable();
            $table->unsignedBigInteger('id_direccion')->nullable();
            $table->unsignedBigInteger('id_admin')->default(0)->comment('id usuario sistema');
            $table->tinyInteger('bienvenido')->default(0);
            $table->tinyInteger('estado')->default(1);
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
        Schema::dropIfExists('vendedors');
    }
}
