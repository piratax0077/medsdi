<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenesBiopsiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examenes_biopsia', function (Blueprint $table) {
            $table->id();
            $table->date('fecha')->nullable();
            $table->string('n_orden')->nullable();
            $table->string('zona1')->nullable();
            $table->string('zona2')->nullable();
            $table->string('zona3')->nullable();
            $table->string('zona4')->nullable();
            $table->string('patologo')->nullable();
            $table->text('observaciones')->nullable();
            $table->integer('id_ficha_atencion');
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
        Schema::dropIfExists('examenes_biopsia');
    }
}
