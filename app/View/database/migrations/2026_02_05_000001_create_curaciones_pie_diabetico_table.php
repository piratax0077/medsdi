<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuracionesPieDiabeticoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curaciones_pie_diabetico', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('id_responsable');
            $table->unsignedBigInteger('id_ficha_atencion')->nullable();
            $table->date('fecha');
            $table->time('hora');
            $table->longText('datos_valoracion_pie_diabetico')->nullable()->comment('JSON con campos: aspecto_pie_diab, obs_aspecto_pie_diab, mayor_extension, obs_mayor_extension, profundidad_curacion, obs_profundidad_curacion, exudado_cantidad_curacion, obs_exudado_cantidad_curacion, exudado_calidad_curacion, obs_exudado_calidad_curacion, tejido_esf, obs_tejido_esf, tejido_granu, obs_tejido_granu, edema_curacion, obs_edema_curacion, dolor_curacion, obs_dolor_curacion, piel_circun, obs_piel_circun, ptos_tot_ev_diab, obs_orin, pat_prop[], sint_act[], ot_pat_act');
            $table->longText('datos_curacion_pie_diabetico')->nullable()->comment('JSON con campos: cp_cult, obs_cp_cult, cp_td, obs_cp_td, cp_duch, obs_cp_duch, pie_ant[], tpo_aposc[], ot_pat_act');
            $table->string('estado')->default('pendiente')->comment('pendiente, en_proceso, completado');
            $table->tinyInteger('activo')->default(1);
            $table->text('observaciones')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('id_responsable')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_ficha_atencion')->references('id')->on('ficha_atencion')->onDelete('set null');

            // Indexes
            $table->index('id_paciente');
            $table->index('id_responsable');
            $table->index('id_ficha_atencion');
            $table->index('activo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curaciones_pie_diabetico');
    }
}
