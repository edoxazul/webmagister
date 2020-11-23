<?php

namespace Database\Factories;

use App\Models\Academicos;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AcademicosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Academicos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_academico'=>$this->faker->name,
            'rut_academico'=>$this->faker->numberBetween(100000000,200000000),
            'fecha_nacimiento'=>$this->faker->dateTime,
            'correo'=>$this->faker->unique()->safeEmail,
            'proyecto'=>$this->faker->title,
            'publicaciones'=>$this->faker->title,
            'estatus'=>$this->faker->randomElement(['Claustro','Colaborador','Visitante']),
            'user_id'=>rand(10,10),
            'linkedin'=>$this->faker->url,
        ];
    }
}
