<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tesis;
use Illuminate\Support\Str;

class TesisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tesis::factory(10)->create();

    }
}
