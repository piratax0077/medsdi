<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('paciente_id')->nullable()->index();
            $table->unsignedBigInteger('profesional_id')->nullable()->index();
            $table->string('tipo')->nullable()->default('venta');
            $table->decimal('total', 12, 2)->default(0);
            $table->string('estado')->default('pendiente')->index();
            $table->dateTime('fecha')->nullable();
            $table->text('notas')->nullable();
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
        Schema::dropIfExists('ordenes');
    }
}
