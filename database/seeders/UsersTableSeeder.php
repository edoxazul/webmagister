    <?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Jose Pena',
            'rut' => '18128077-8',
            'rol' => 'Administrador',
            'email' => 'jose@email.com',
            'password' => bcrypt('123')
        ]);

        App\User::create([
            'name' => 'Maikel Carvajal',
            'rut' => '19397790-1',
            'rol' => 'Profesor',
            'email' => 'maikel@email.com',
            'password' => bcrypt('321')
        ]);

        App\User::create([
            'name' => 'Nicole Perez',
            'rut' => '87654321',
            'rol' => 'Secretaria',
            'email' => 'nicole@email.com',
            'password' => bcrypt('123456')
        ]);
    }
}
