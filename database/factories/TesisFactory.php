<?php

namespace Database\Factories;

use App\Models\Tesis;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TesisFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tesis::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo'=>$this->faker->text(20),
            'autor'=>$this->faker->name(),
            'tutor'=>$this->faker->name(),
            'anteproyecto_path'=>$this->faker->url(),
            'resumentesis_path'=>$this->faker->url(),
            'estatus'=>$this->faker->randomElement(['En Formulacion','Aprobado','Rechazado']),
        ];
    }
}
