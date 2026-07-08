<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampanaEmailDestinatariosDistribucionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('campana_email_destinatarios_distribucion')) {
            Schema::create('campana_email_destinatarios_distribucion', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('id_campana_email');
                $table->unsignedBigInteger('id_cliente');
                $table->string('email_cliente');
                $table->enum('estado_envio', ['pendiente', 'enviado', 'fallido'])->default('pendiente');
                $table->timestamp('fecha_envio')->nullable();
                $table->longText('error_mensaje')->nullable();
                $table->timestamps();

                // Indexes
                $table->index('id_campana_email');
                $table->index('id_cliente');
                $table->index('estado_envio');

                // Foreign keys
                $table->foreign('id_campana_email')
                    ->references('id')
                    ->on('campanas_email_distribucion')
                    ->onDelete('cascade');

                $table->foreign('id_cliente')
                    ->references('id')
                    ->on('clientes')
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
        Schema::dropIfExists('campana_email_destinatarios_distribucion');
    }
}
