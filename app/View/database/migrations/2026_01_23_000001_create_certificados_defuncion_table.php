<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificadosDefuncionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificados_defuncion', function (Blueprint $table) {
            $table->id();

            // Relaciones
            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('id_ficha_atencion')->nullable();
            $table->unsignedBigInteger('id_profesional');
            $table->unsignedBigInteger('id_lugar_atencion');

            // 1. Identidad del fallecido
            $table->string('nombre_fallecido', 255)->nullable();
            $table->string('rut_fallecido', 20)->nullable();
            $table->tinyInteger('sexo_fallecido')->nullable()->comment('1:Masculino, 2:Femenino, 3:Indeterminado');
            $table->date('fecha_nacimiento')->nullable();
            $table->integer('edad_fallecido')->nullable();
            $table->dateTime('fecha_hora_menor_ano')->nullable();

            // Testigos
            $table->string('testigo_1_nombre', 255)->nullable();
            $table->string('testigo_1_rut', 20)->nullable();
            $table->string('testigo_1_firma', 255)->nullable();
            $table->string('testigo_2_nombre', 255)->nullable();
            $table->string('testigo_2_rut', 20)->nullable();
            $table->string('testigo_2_firma', 255)->nullable();

            // 2. Datos de la defunción
            $table->date('fecha_fallecimiento');
            $table->time('hora_fallecimiento');
            $table->integer('peso_nacer')->nullable()->comment('Peso en gramos');
            $table->integer('semanas_gestacion')->nullable();
            $table->tinyInteger('estado_nutricional')->nullable()->comment('1:Eutrófico, 2:Desnutrición G-I, 3:G-II, 4:G-III, 5:Ignorado');
            $table->tinyInteger('lugar_defuncion')->nullable()->comment('1:Hospital/Clínica, 2:Casa, 3:Otro');
            $table->string('establecimiento_direccion', 500)->nullable();
            $table->unsignedBigInteger('region_defuncion')->nullable();
            $table->unsignedBigInteger('comuna_defuncion')->nullable();

            // 3. Causas de muerte
            $table->text('causa_inmediata');
            $table->text('causas_originarias')->nullable();
            $table->text('estados_morbosos_concomitantes')->nullable();

            // 4. Fundamento de causa de muerte
            $table->tinyInteger('fundamento_causa_muerte')->nullable()->comment('1:Autopsia, 2:Biopsia, 3:Operación, 4:Exámenes lab, 5:Cuadro clínico, 6:Testigos');
            $table->tinyInteger('lugar_ocurrencia')->nullable()->comment('1:Casa, 2:Vía pública, 3:Trabajo, 4:Otra');
            $table->tinyInteger('circunstancias')->nullable()->comment('1:Peatón, 2:Conductor, 3:Pasajero, 4:Otra');
            $table->tinyInteger('tipo_muerte')->nullable()->comment('1:Accidente, 2:Suicidio, 3:Homicidio, 4:Otra');

            // 5. Atención médica
            $table->tinyInteger('atencion_medica_ultima_enfermedad')->nullable()->comment('1:Si, 2:No, 3:Ignorado');

            // 6. Médico certificante
            $table->tinyInteger('calidad_firmante')->nullable()->comment('1:Médico tratante, 2:Médico legista, 3:Patólogo, 4:Otro');
            $table->tinyInteger('otros_firmantes')->nullable()->comment('1:Matrón/a, 2:Testigo, 3:Ignorado');
            $table->string('nombre_medico', 255)->nullable();
            $table->string('rut_medico', 20)->nullable();
            $table->string('telefono_medico', 20)->nullable();
            $table->string('domicilio_medico', 500)->nullable();
            $table->string('firma_medico', 255)->nullable();
            $table->string('autenticacion_documento', 255)->nullable();

            // Datos Registro Civil
            $table->string('residencia_fallecido', 500)->nullable();
            $table->unsignedBigInteger('region_residencia')->nullable();
            $table->unsignedBigInteger('ciudad_residencia')->nullable();
            $table->string('ocupacion_fallecido', 255)->nullable();
            $table->tinyInteger('nivel_educacion')->nullable()->comment('1:Superior, 2:Medio/Secundario, 3:Básico/Primario, 4:Ninguno');
            $table->string('ultimo_curso', 50)->nullable();
            $table->tinyInteger('nivel_ocupacional')->nullable()->comment('1:Patrón/a, 2:Empleado/a, 3:Obrero, 4:Trabajador cuenta propia');

            // Datos para menores de 1 año o defunción fetal
            $table->tinyInteger('tipo_menor_ano')->nullable()->comment('1:Menor de 1 año, 2:Defunción fetal');
            $table->string('nombre_gestante', 255)->nullable();
            $table->tinyInteger('estado_civil_madre')->nullable()->comment('1:Soltera, 2:Casada, 3:Viuda, 4:Divorciada, 5:Conviviente Civil, 6:Separada Judicialmente');
            $table->integer('hijos_vivos')->nullable();
            $table->integer('hijos_fallecidos')->nullable();
            $table->integer('hijos_mortinatos')->nullable();
            $table->integer('hijos_total')->nullable();
            $table->tinyInteger('tipo_parto_aborto_anterior')->nullable()->comment('1:Parto, 2:Aborto');
            $table->date('fecha_parto_anterior')->nullable();
            $table->string('nombre_padre', 255)->nullable();
            $table->integer('edad_padre')->nullable();
            $table->integer('ultimo_curso_padre')->nullable();
            $table->tinyInteger('instruccion_padre')->nullable()->comment('1:Superior, 2:Medio/Secundario, 3:Básico/Primario, 4:Ninguno');
            $table->string('ocupacion_padre', 255)->nullable();
            $table->tinyInteger('nivel_ocupacional_padre')->nullable()->comment('1:Patrón/a, 2:Empleado/a, 3:Obrero, 4:Trabajador cuenta propia');

            // Código de autorización
            $table->string('cod_auto', 100)->nullable();

            $table->timestamps();

            // Foreign keys
            $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('id_ficha_atencion')->references('id')->on('ficha_atencions')->onDelete('set null');
            $table->foreign('id_profesional')->references('id')->on('profesionales')->onDelete('cascade');
            $table->foreign('id_lugar_atencion')->references('id')->on('lugares_atencion')->onDelete('cascade');

            // Índices para mejorar búsquedas
            $table->index('id_paciente');
            $table->index('id_ficha_atencion');
            $table->index('fecha_fallecimiento');
            $table->index('rut_fallecido');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificados_defuncion');
    }
}
