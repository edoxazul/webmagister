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
            'rut_academico'=>$this->faker->Str::random(10),
            'fecha_nacimiento'=>$this->faker->date('d-m-Y'),
            'correo'=>$this->faker->unique()->safeEmail,
            'proyecto'=>$this->faker->title,
            'publicaciones'=>$this->faker->title,
            'estatus'=>$this->faker->randomElement(['Claustro','Colaborador','Visitante']),
            'linkedin'=>$this->faker->link,
        ];
    }
}
