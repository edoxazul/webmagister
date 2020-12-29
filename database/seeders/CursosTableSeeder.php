<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cursos;

class CursosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cursos::factory(10)->create();
    }
}
