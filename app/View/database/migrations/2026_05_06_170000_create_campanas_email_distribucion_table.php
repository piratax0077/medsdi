<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampanasEmailDistribucionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('campanas_email_distribucion')) {
            Schema::create('campanas_email_distribucion', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('id_institucion');
                $table->unsignedBigInteger('id_profesional');
                $table->string('titulo');
                $table->longText('mensaje');
                $table->string('remitente')->nullable();
                $table->integer('total_destinatarios')->default(0);
                $table->integer('enviados')->default(0);
                $table->integer('fallidos')->default(0);
                $table->enum('estado', ['borrador', 'enviando', 'enviada', 'error'])->default('borrador');
                $table->timestamp('fecha_envio')->nullable();
                $table->longText('log_errores')->nullable();
                $table->timestamps();

                // Indexes
                $table->index('id_institucion');
                $table->index('id_profesional');
                $table->index('estado');
                $table->index('created_at');

                // Foreign keys
                $table->foreign('id_institucion')
                    ->references('id')
                    ->on('instituciones')
                    ->onDelete('cascade');

                $table->foreign('id_profesional')
                    ->references('id')
                    ->on('profesionales')
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
        Schema::dropIfExists('campanas_email_distribucion');
    }
}
