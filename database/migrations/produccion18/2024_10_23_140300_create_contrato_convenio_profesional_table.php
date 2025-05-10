<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratoConvenioProfesionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato_convenio_profesional', function (Blueprint $table) {
            $table->id();
            $table->integer('id_tipo_contrato');
            $table->double('valor_fijo')->nullable();
            $table->double('porcentaje_variable')->nullable();
            $table->double('conf_agenda')->nullable();
            $table->double('gastos_comunes')->nullable();
            $table->double('gastos_box')->nullable();
            $table->string('rut')->nullable();
            $table->string('nombres')->nullable();
            $table->string('apellido_uno')->nullable();
            $table->string('apellido_dos')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->integer('id_institucion')->nullable();
            $table->integer('id_lugar_atencion')->nullable();
            $table->integer('id_tipo_contrato_duracion')->nullable();

            $table->integer('n_bonos_mes_fonasa')->nullable();
            $table->integer('total_copago_mes_fonasa')->nullable();
            $table->integer('total_seguros_mes_fonasa')->nullable();
            $table->integer('bonificacion_mes_fonasa')->nullable();
            $table->integer('n_bonos_profesional_fonasa')->nullable();
            $table->integer('n_copagos_profesional_fonasa')->nullable();
            $table->integer('n_bonos_pendientes_fonasa')->nullable();
            $table->integer('n_copagos_pendientes_fonasa')->nullable();
            $table->integer('valor_enviado_fonasa_cobro')->nullable();

            $table->integer('n_bonos_mes_isapre')->nullable();
            $table->integer('total_copago_mes_isapre')->nullable();
            $table->integer('total_seguros_mes_isapre')->nullable();
            $table->integer('bonificacion_mes_isapre')->nullable();
            $table->integer('n_bonos_profesional_isapre')->nullable();
            $table->integer('n_copagos_profesional_isapre')->nullable();
            $table->integer('n_bonos_pendientes_isapre')->nullable();
            $table->integer('n_copagos_pendientes_isapre')->nullable();
            $table->integer('valor_enviado_isapre_cobro')->nullable();

            $table->integer('n_atenciones')->nullable();
            $table->integer('valor_particular')->nullable();
            $table->integer('total_copagos_recibidos')->nullable();
            $table->integer('total_efectivo_recibido')->nullable();

            $table->integer('n_particulares_pendientes')->nullable();
            $table->integer('n_copagos_pendientes')->nullable();
            $table->integer('total_efectivo_pendiente')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_termino')->nullable();

            $table->integer('n_bonos_fisicos_haberes')->nullable();
            $table->integer('valores_fonasa_haberes')->nullable();
            $table->integer('valores_isapre_haberes')->nullable();
            $table->integer('valores_particulares_haberes')->nullable();
            $table->integer('valores_pagar_institucion')->nullable();
            $table->integer('valores_recibidos')->nullable();
            $table->string('otros')->nullable();
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
        Schema::dropIfExists('contrato_convenio_profesional');
    }
}
