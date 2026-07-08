<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateInstitucionAdministradoresTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('institucion_administradores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_institucion');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_tipo_administrador');
            $table->tinyInteger('estado')->default(1);
            $table->timestamps();

            $table->unique(['id_institucion', 'id_tipo_administrador'], 'unique_inst_tipo_adm');

            $table->foreign('id_institucion')->references('id')->on('instituciones')->onDelete('cascade');
            $table->foreign('id_tipo_administrador')->references('id')->on('tipo_administrador')->onDelete('cascade');
        });

        // Migrar datos existentes desde columnas hardcodeadas de instituciones
        $instituciones = DB::table('instituciones')->get();

        foreach ($instituciones as $inst) {
            $columnas = [
                'id_director_medico'            => 1,
                'id_subdirector_medico'         => 2,
                'id_director_gestion_cuidado'   => 3,
                'id_director_comercial'         => 4,
                'id_director_tecnico'           => 8,
            ];

            foreach ($columnas as $columna => $id_tipo) {
                $id_usuario = $inst->{$columna} ?? null;
                if ($id_usuario) {
                    DB::table('institucion_administradores')->insertOrIgnore([
                        'id_institucion'        => $inst->id,
                        'id_usuario'            => $id_usuario,
                        'id_tipo_administrador' => $id_tipo,
                        'estado'                => 1,
                        'created_at'            => now(),
                        'updated_at'            => now(),
                    ]);
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institucion_administradores');
    }
}
