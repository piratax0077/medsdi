<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdatePrevisionesSeeder extends Seeder
{
    public function run()
    {
        DB::table('previsiones')->where('id', 1)->update([
            'tipo' => 'fonasa',
            'usa_api' => 0,
            'permite_bonos' => 1,
            'proveedor_api' => 'fonasa',
        ]);

        DB::table('previsiones')->whereIn('id', [2,3,4,5,6,7,8,9,10,11])->update([
            'tipo' => 'isapre',
            'usa_api' => 0,
            'permite_bonos' => 1,
            'proveedor_api' => 'isapre',
        ]);

        DB::table('previsiones')->where('id', 12)->update([
            'tipo' => 'interno',
            'usa_api' => 0,
            'permite_bonos' => 0,
            'proveedor_api' => null,
        ]);

        DB::table('previsiones')->where('id', 13)->update([
            'tipo' => 'particular',
            'usa_api' => 0,
            'permite_bonos' => 0,
            'proveedor_api' => null,
        ]);
    }
}
