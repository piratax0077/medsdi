<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendedorLugarAtencionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendedor_lugar_atencions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_vendedor');
            $table->unsignedBigInteger('id_lugar_atencion');
            $table->string('token')->nullable();
            $table->unsignedBigInteger('id_profesional')->nullable();
            $table->unsignedBigInteger('id_institucion')->nullable();
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
        Schema::dropIfExists('vendedor_lugar_atencions');
    }
}
