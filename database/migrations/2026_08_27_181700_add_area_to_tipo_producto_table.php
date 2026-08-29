<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddAreaToTipoProductoTable extends Migration
{
    public function up()
    {
        Schema::table('tipo_producto', function (Blueprint $table) {
            $table->string('area', 50)->nullable()->after('nombre')->index();
        });

        // Categorías claramente odontológicas existentes.
        $categoriasOdontologia = [
            'Anestesia dental',
            'Bioseguridad y descartables',
            'Cirugía oral',
            'Endodoncia',
            'Implantología',
            'Periodoncia',
        ];

        DB::table('tipo_producto')
            ->whereIn('nombre', $categoriasOdontologia)
            ->update(['area' => 'odontologia']);

        // Categoría transversal para materiales usados en odontología general.
        $odontologiaGeneral = DB::table('tipo_producto')
            ->whereRaw('LOWER(nombre) = ?', ['odontología general'])
            ->first();

        if ($odontologiaGeneral) {
            DB::table('tipo_producto')
                ->where('id', $odontologiaGeneral->id)
                ->update(['area' => 'odontologia']);
        } else {
            $datos = [
                'nombre' => 'Odontología general',
                'area' => 'odontologia',
            ];

            // La tabla puede o no manejar timestamps según la versión del proyecto.
            if (Schema::hasColumn('tipo_producto', 'created_at')) {
                $datos['created_at'] = now();
            }
            if (Schema::hasColumn('tipo_producto', 'updated_at')) {
                $datos['updated_at'] = now();
            }

            DB::table('tipo_producto')->insert($datos);
        }
    }

    public function down()
    {
        Schema::table('tipo_producto', function (Blueprint $table) {
            $table->dropIndex(['area']);
            $table->dropColumn('area');
        });
    }
}
