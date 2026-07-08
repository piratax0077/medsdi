<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddValoresToProfesionalConveniosTable extends Migration
{
    public function up()
    {
        Schema::table('profesional_convenios', function (Blueprint $table) {
            if (!Schema::hasColumn('profesional_convenios', 'nombre_convenio')) {
                $table->string('nombre_convenio')->nullable()->after('convenios');
            }
            if (!Schema::hasColumn('profesional_convenios', 'id_tipo_convenio')) {
                $table->integer('id_tipo_convenio')->nullable()->after('nombre_convenio');
            }
            if (!Schema::hasColumn('profesional_convenios', 'porcentaje')) {
                $table->double('porcentaje')->default(0)->after('valor');
            }
            if (!Schema::hasColumn('profesional_convenios', 'valor_garantia')) {
                $table->double('valor_garantia')->nullable()->after('porcentaje');
            }
            if (!Schema::hasColumn('profesional_convenios', 'valor_copago_fonasa')) {
                $table->double('valor_copago_fonasa')->nullable()->after('valor_garantia');
            }
            if (!Schema::hasColumn('profesional_convenios', 'valor_bon_fonasa')) {
                $table->double('valor_bon_fonasa')->nullable()->after('valor_copago_fonasa');
            }
            if (!Schema::hasColumn('profesional_convenios', 'fecha_inicio')) {
                $table->date('fecha_inicio')->nullable()->after('valor_bon_fonasa');
            }
            if (!Schema::hasColumn('profesional_convenios', 'fecha_fin')) {
                $table->date('fecha_fin')->nullable()->after('fecha_inicio');
            }
            if (!Schema::hasColumn('profesional_convenios', 'observaciones')) {
                $table->text('observaciones')->nullable()->after('fecha_fin');
            }
            if (!Schema::hasColumn('profesional_convenios', 'estado')) {
                $table->integer('estado')->default(1)->after('observaciones');
            }
        });
    }

    public function down()
    {
        Schema::table('profesional_convenios', function (Blueprint $table) {
            $cols = ['nombre_convenio', 'id_tipo_convenio', 'porcentaje',
                     'valor_garantia', 'valor_copago_fonasa', 'valor_bon_fonasa',
                     'fecha_inicio', 'fecha_fin', 'observaciones', 'estado'];
            $existing = array_filter($cols, fn($c) => Schema::hasColumn('profesional_convenios', $c));
            if ($existing) {
                $table->dropColumn(array_values($existing));
            }
        });
    }
}
