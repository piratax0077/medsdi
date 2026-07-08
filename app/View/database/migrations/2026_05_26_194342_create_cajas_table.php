<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCajasTable extends Migration
{
    public function up()
    {
        Schema::create('cajas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_caja');
            $table->unsignedBigInteger('id_usuario'); // usuario que abre/cierra la caja
            $table->decimal('saldo_final_caja_anterior', 12, 2)->default(0);
            $table->decimal('monto_apertura', 12, 2);
            $table->dateTime('fecha_apertura');
            $table->dateTime('fecha_cierre')->nullable();
            $table->decimal('monto_cierre', 12, 2)->nullable();
            $table->string('estado')->default('abierta'); // abierta/cerrada
            $table->timestamps();

            $table->foreign('id_usuario')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cajas');
    }
}
