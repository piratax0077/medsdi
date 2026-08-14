<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTratamientosProfesionalInsumosTable extends Migration
{
    public function up()
    {
        Schema::create('tratamientos_profesional_insumos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_diagnostico_profesional');
            $table->unsignedBigInteger('id_producto');
            $table->decimal('cantidad', 10, 2)->default(1);
            $table->decimal('valor_unitario', 12, 2)->default(0);
            $table->string('observaciones')->nullable();
            $table->boolean('estado')->default(true);
            $table->timestamps();
            $table->unique(['id_diagnostico_profesional', 'id_producto'], 'tratamiento_producto_unico');
        });

        Schema::table('insumos_tratamientos_dental', function (Blueprint $table) {
            $table->unsignedBigInteger('id_producto')->nullable()->after('id_tratamiento');
            $table->unsignedBigInteger('id_pack_origen')->nullable()->after('id_producto');
        });
    }

    public function down()
    {
        Schema::table('insumos_tratamientos_dental', function (Blueprint $table) {
            $table->dropColumn(['id_producto', 'id_pack_origen']);
        });
        Schema::dropIfExists('tratamientos_profesional_insumos');
    }
}
