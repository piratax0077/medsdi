<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPagoGarantiaToHonos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bonos', function (Blueprint $table) {
            $table->boolean('pagado_garantia')->after('a_pagar')->default(false)->comment('Indica si la garantía fue pagada');
            $table->timestamp('fecha_pago_garantia')->after('pagado_garantia')->nullable()->comment('Fecha en que se pagó la garantía');
            $table->unsignedBigInteger('id_usuario_pago_garantia')->after('fecha_pago_garantia')->nullable()->comment('ID del usuario que registró el pago');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bonos', function (Blueprint $table) {
            $table->dropColumn('pagado_garantia');
            $table->dropColumn('fecha_pago_garantia');
            $table->dropColumn('id_usuario_pago_garantia');
        });
    }
}
