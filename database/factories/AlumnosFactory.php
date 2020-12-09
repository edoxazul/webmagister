<?php

namespace Database\Factories;

use App\Models\Alumnos;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AlumnosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Alumnos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_alumno'=>$this->faker->name(),
            'rut_alumno'=>$this->faker->numberBetween(100000000,200000000),
            'carrera_alumno'=>$this->faker->name(),
            'contacto_alumno'=>$this->faker->unique()->safeEmail,
            'estado_alumno'=>$this->faker->randomElement(['Regular', 'Graduado','Egresado','Retiro Voluntario','Eliminado']),
            'razon_eliminacion'=>$this->faker->name(),
            'anio_ingreso'=>$this->faker->dateTime($max = 'now'),
            'anio_graduacion'=>$this->faker->dateTimeBetween('+0 days', '+2 years'),
            'trabajo_tesis'=>$this->faker->name(),
            'linkedin'=>$this->faker->url,
            'academico_id'=>$this->faker->numberBetween(1,10)
        ];
    }
}
