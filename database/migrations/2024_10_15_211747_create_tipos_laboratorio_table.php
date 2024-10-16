<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposLaboratorioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_laboratorio', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('descripcion', 255)->nullable();
            $table->string('otros', 255)->nullable();
            $table->integer('id_usuario')->nullable();
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
        Schema::dropIfExists('tipos_laboratorio');
    }
}
