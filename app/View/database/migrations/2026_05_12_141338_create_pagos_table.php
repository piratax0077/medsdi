<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cliente');
            $table->decimal('monto', 10, 2)->comment('Monto pagado');
            $table->date('fecha_pago')->comment('Fecha del pago');
            $table->unsignedBigInteger('id_forma_pago')->nullable();
            $table->string('numero_documento', 100)->nullable()->comment('Número de cheque, comprobante, transferencia, etc');
            $table->text('observaciones')->nullable()->comment('Observaciones adicionales del pago');
            $table->string('estado', 50)->default('pendiente')->comment('pendiente, confirmado, rechazado');
            $table->unsignedBigInteger('id_usuario')->nullable()->comment('Usuario que registró el pago');
            $table->tinyInteger('activo')->default(1);
            $table->timestamps();

            // Relaciones
            $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('id_forma_pago')->references('id')->on('formas_pago')->onDelete('set null');
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('set null');

            // Índices
            $table->index('id_cliente');
            $table->index('fecha_pago');
            $table->index('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagos');
    }
}
