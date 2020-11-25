<?php

namespace Database\Factories;

use App\Models\Alumno;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AlumnoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_alumno'=>$this->faker->name(),
            'rut_academico'=>$this->faker->numberBetween(100000000,200000000),
            'nombre_pregrado_alumno'=>$this->faker->name(),
            'nombre_institucion_alumno'=>$this->faker->name(),
            'contacto_alumno'=>$this->faker->unique()->safeEmail,
            'estatus_alumno'=>$this->faker->randomElement(['Regular', 'Graduado','Egresado','Retiro Voluntario','Eliminado']),
            'user_id'=>rand(10,10),
            'linkedin'=>$this->faker->url,
        ];
    }
}
