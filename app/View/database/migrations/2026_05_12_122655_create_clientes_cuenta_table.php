<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesCuentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes_cuenta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cliente');
            $table->date('fecha_operacion');
            $table->decimal('pago', 10, 2)->comment('Monto pagado');
            $table->unsignedBigInteger('id_forma_pago')->nullable();
            $table->string('numero_documento', 100)->nullable()->comment('Número de cheque, comprobante, etc');
            $table->text('referencia')->nullable()->comment('Datos adicionales del pago');
            $table->tinyInteger('activo')->default(1);
            $table->timestamps();

            // Relaciones
            $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('id_forma_pago')->references('id')->on('formas_pago')->onDelete('set null');

            // Índices
            $table->index('id_cliente');
            $table->index('fecha_operacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes_cuenta');
    }
}
