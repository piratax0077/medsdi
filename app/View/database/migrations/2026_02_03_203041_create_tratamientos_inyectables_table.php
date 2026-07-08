<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTratamientosInyectablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tratamientos_inyectables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ficha_atencion_id');
            $table->unsignedBigInteger('paciente_id');
            $table->enum('tipo', ['receta_medica', 'inyectable_im_iv', 'control_sueros'])->comment('Tipo de tratamiento inyectable');

            // Campos para Receta Médica
            $table->string('id_receta_sdi')->nullable()->comment('ID de la receta en el sistema SDI');
            $table->boolean('buscar_receta')->default(false)->comment('Indica si se debe buscar la receta en el sistema');
            $table->text('observaciones_receta')->nullable()->comment('Observaciones de la receta médica');
            $table->json('imagenes')->nullable()->comment('JSON con las imágenes adjuntas de la receta');

            // Campos para Inyectable IM/IV
            $table->text('incidentes_procedimiento')->nullable()->comment('Incidentes durante el procedimiento');
            $table->text('otras_observaciones_procedimiento')->nullable()->comment('Otras observaciones del procedimiento');

            // Campos para Control de Sueros
            $table->text('descripcion_sueros')->nullable()->comment('Suero Tipo / hora de inicio / gotas/min');
            $table->text('otros_tratamientos_parenterales')->nullable()->comment('Otros tratamientos parenterales');
            $table->text('observaciones_examen_control')->nullable()->comment('Observaciones del examen y control');
            $table->text('control_signos_vitales')->nullable()->comment('Control de signos vitales durante el procedimiento');

            // Campos comunes
            $table->unsignedBigInteger('usuario_registro_id')->nullable()->comment('ID del usuario que registró');
            $table->timestamps();
            $table->softDeletes();

            // Índices y claves foráneas
            $table->index('ficha_atencion_id');
            $table->index('paciente_id');
            $table->index('tipo');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tratamientos_inyectables');
    }
}
