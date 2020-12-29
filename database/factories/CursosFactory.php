<?php

namespace Database\Factories;

use App\Models\Cursos;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class CursosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cursos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nombre=$this->faker->name();
        return [
            'nombre_curso'=>$nombre,
            'descripcion_curso'=>$this->faker->sentence(),
            'enlace_curso'=>$this->faker->url(),
            'archivo_curso'=>$nombre
        ];
    }
}
