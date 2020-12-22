<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use UsersTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AcademicosTableSeeder::class);
        $this->call(AlumnosTableSeeder::class);
        $this->call(NoticiasTableSeeder::class);
        // $this->call(InfoMagisterTableSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
