<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('productos')->insert([
            'nombre' => 'Arroz',
            'precio' => 1000,
            'stock' => 100,
            'imagen' => 'arroz.jpg',
            'descripcion' => 'Arroz grano largo',
            'tipo_producto' => 3,
            'unidad_medida' => 'Kg',
            'marca' => 'Tucapel',
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Azucar',
            'precio' => 500,
            'stock' => 100,
            'imagen' => 'azucar.jpg',
            'descripcion' => 'Azucar blanca',
            'tipo_producto' => 1,
            'unidad_medida' => 'Kg',
            'marca' => 'Tucapel',
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Harina',
            'precio' => 800,
            'stock' => 100,
            'imagen' => 'harina.jpg',
            'descripcion' => 'Harina de trigo',
            'tipo_producto' => 2,
            'unidad_medida' => 'Kg',
            'marca' => 'Tucapel',
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Aceite',
            'precio' => 1500,
            'stock' => 100,
            'imagen' => 'aceite.jpg',
            'descripcion' => 'Aceite de maravilla',
            'tipo_producto' => 1,
            'unidad_medida' => 'Kg',
            'marca' => 'Tucapel',
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Leche',
            'precio' => 1000,
            'stock' => 100,
            'imagen' => 'leche.jpg',
            'descripcion' => 'Leche entera',
            'tipo_producto' => 2,
            'unidad_medida' => 'Kg',
            'marca' => 'Tucapel',
        ]);
    }
}
