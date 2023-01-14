<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableVentaBonos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Venta_bonos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_usuario_venta')->nullable(); // profesional, asistente, institucion,
            $table->bigInteger('id_usuario_paciente')->nullable(); // paciente,
            $table->bigInteger('id_convenio')->nullable(); // fonasa, isapres
            $table->bigInteger('n_confirmacion_app')->nullable(); //autorizacion paciente
            $table->bigInteger('n_bono')->nullable(); //folio bono
            $table->bigInteger('id_lugar_atencion')->nullable();//lugar de atencion
            $table->bigInteger('id_destinatario')->nullable();//profesional o laboratorio
            $table->bigInteger('id_ficha_atencion')->nullable();//ficha de atencion??????????


            $table->string('valor_bono')->nullable()->nullable();
            $table->string('aporte_convenio')->nullable();//aporte inst convenio isapre fonasa
            $table->string('copago_usuario_paciente')->nullable();//valor copago
            $table->string('id_seguro_1')->nullable();//descuento por aporte seguro
            $table->string('id_cajas_2')->nullable();//descuento por aporte seguro
            $table->string('total_pago_paciente')->nullable();//=copago paciente menos aporte seguros
            $table->string('otro')->nullable();
            $table->string('otro_1')->nullable();
            $table->tinyInteger('procesado')->nullable()->default(0); // 0,1 rendido o no
            $table->dateTime('fecha_venta')->nullable();
            $table->dateTime('fecha_atencion')->nullable();
            $table->integer('estado')->nullable()->default(0); // 0-no atendido, 1-atendido,(por profesional)
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
        Schema::dropIfExists('venta_bonos');
    }
}
