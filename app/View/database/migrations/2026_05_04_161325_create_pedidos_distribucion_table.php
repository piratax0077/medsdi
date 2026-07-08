<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosDistribucionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos_distribucion', function (Blueprint $table) {
            $table->id();

            // Referencias
            $table->unsignedBigInteger('id_cliente')->nullable();
            $table->unsignedBigInteger('id_usuario')->nullable(); // Vendedor/Profesional
            $table->unsignedBigInteger('id_lugar_atencion')->nullable();

            // Información del pedido
            $table->string('numero_pedido', 50)->unique()->nullable();
            $table->enum('estado', ['pendiente', 'procesado', 'cancelado', 'devuelto'])->default('pendiente');
            $table->json('items_pedido')->nullable(); // Almacenar items como JSON
            $table->decimal('total', 12, 2)->default(0);
            $table->decimal('descuento_total', 12, 2)->default(0);
            $table->decimal('monto_neto', 12, 2)->default(0);

            // Pago y observaciones
            $table->string('metodo_pago')->nullable();
            $table->text('observaciones')->nullable();

            // Auditoría
            $table->timestamp('fecha_procesamiento')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Índices
            $table->index('id_cliente');
            $table->index('id_usuario');
            $table->index('estado');
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
        Schema::dropIfExists('pedidos_distribucion');
    }
}
