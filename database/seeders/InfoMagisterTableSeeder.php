<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\InfoMagister;

class InfoMagisterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InfoMagister::factory(1)->create();

    }
}
