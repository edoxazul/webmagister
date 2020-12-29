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
            'nombre_academico'=>$this->faker->name(),
            'rut_academico'=>$this->faker->numberBetween(100000000,200000000),
            'fecha_nacimiento'=>$this->faker->dateTime(),
            'grado_academico'=>$this->faker->randomElement(['Bachiller','Licenciado','Magíster','Doctor']),
            'area_especializacion'=>$this->faker->randomElement(['Robótica','Des. de Software','Ing. de datos']),
            'correo'=>$this->faker->unique()->safeEmail,
            'proyecto'=>$this->faker->url(),
            'publicaciones'=>$this->faker->url(),
            'estatus'=>$this->faker->randomElement(['Claustro','Colaborador','Visitante']),
            'profile_photo_path'=>$this->faker->imageUrl($width = 640, $height = 480),
            'linkedin'=>$this->faker->url,
            'trabajo_tesis_supervisado'=>$this->faker->url(),

        ];
    }
}
