<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_detalles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('orden_id')->index();
            $table->unsignedBigInteger('producto_id')->nullable()->index();
            $table->unsignedBigInteger('servicio_id')->nullable()->index();
            $table->unsignedBigInteger('convenio_id')->nullable()->index();
            $table->string('descripcion')->nullable();
            $table->integer('cantidad')->default(1);
            $table->decimal('precio_unitario', 12, 2)->default(0);
            $table->decimal('subtotal', 12, 2)->default(0);
            $table->timestamps();

            $table->foreign('orden_id')->references('id')->on('ordenes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orden_detalles', function (Blueprint $table) {
            $table->dropForeign(['orden_id']);
        });
        Schema::dropIfExists('orden_detalles');
    }
}
