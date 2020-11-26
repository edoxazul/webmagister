<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Noticias;
use Illuminate\Support\Str;

class NoticiasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Noticias::factory(10)->create();
    }
}
