<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPrevisionesAddApiFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('previsiones', function (Blueprint $table) {

            $table->string('tipo', 30)
                ->nullable()
                ->after('codigo')
                ->comment('fonasa, isapre, particular, interno');

            $table->boolean('usa_api')
                ->default(false)
                ->after('tipo')
                ->comment('Indica si la previsión utiliza integración API');

            $table->string('proveedor_api', 50)
                ->nullable()
                ->after('usa_api')
                ->comment('fonasa, imed, medipass, etc.');

            $table->json('configuracion')
                ->nullable()
                ->after('proveedor_api')
                ->comment('Configuración futura de integración');

                $table->boolean('permite_bonos')
                ->default(true)
                ->after('usa_api')
                ->comment('Permite emitir bonos desde el sistema');
            });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('previsiones', function (Blueprint $table) {

            $table->dropColumn([
                'tipo',
                'usa_api',
                'proveedor_api',
                'configuracion'
            ]);

        });
    }
}
