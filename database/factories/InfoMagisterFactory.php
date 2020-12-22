<?php

namespace Database\Factories;

use App\Models\InfoMagister;
use Illuminate\Database\Eloquent\Factories\Factory;

class InfoMagisterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InfoMagister::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'proposito_magister'=>$this->faker->title,
            'objetivo_magister'=>$this->faker->title,
            'descripcion_magister'=>$this->faker->title,
            'perfil_entrada_magister'=>$this->faker->title,
            'regimen_magister'=>$this->faker->title,
            'contacto_magister'=>$this->faker->title,
            'costo_magister'=>$this->faker->title,
        ];
    }
}
