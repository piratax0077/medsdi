<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Responsable;

class ResponsablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Responsable::factory(50)->create();
    }
}