<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampanasPromocionalesDistribucionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('campanas_promocionales_distribucion')) {
            Schema::create('campanas_promocionales_distribucion', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('id_institucion');
                $table->unsignedBigInteger('id_profesional');
                $table->string('nombre');
                $table->longText('descripcion');
                $table->date('fecha_inicio');
                $table->date('fecha_termino')->nullable();
                $table->decimal('descuento_porcentaje', 5, 2)->nullable();
                $table->decimal('descuento_valor', 12, 2)->nullable();
                $table->enum('tipo_descuento', ['porcentaje', 'valor_fijo', 'otro'])->default('porcentaje');
                $table->enum('estado', ['activa', 'inactiva', 'finalizada'])->default('activa');
                $table->longText('observaciones')->nullable();
                $table->timestamps();

                // Indexes
                $table->index('id_institucion');
                $table->index('id_profesional');
                $table->index('estado');
                $table->index('fecha_inicio');

                // Foreign keys
                $table->foreign('id_institucion')
                    ->references('id')
                    ->on('instituciones')
                    ->onDelete('cascade');

                $table->foreign('id_profesional')
                    ->references('id')
                    ->on('profesionales')
                    ->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campanas_promocionales_distribucion');
    }
}
