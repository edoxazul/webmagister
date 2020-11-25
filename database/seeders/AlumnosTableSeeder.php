<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alumnos;

class AlumnosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Alumnos::factory(30)->create();
    }
}
