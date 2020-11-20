<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Academicos;
use Illuminate\Support\Str;


class AcademicosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Academicos::factory(10)->create();
    }
}
