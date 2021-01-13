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
        $nombre=$this->faker->name();

        return [
            'titulo'=>$this->faker->text(20),
            'autor'=>$nombre,
            'tutor'=>$this->faker->name(),
            'anio_aprobacion'=>$this->faker->dateTimeBetween('+0 days', '+2 years'),
            'anteproyecto_path'=>$this->faker->url(),
            'resumentesis_path'=>$this->faker->url(),
            'archivo_anteproyecto'=>$nombre,
            'archivo_resumentesis'=>$nombre,
            'estatus'=>$this->faker->randomElement(['En Formulacion','Aprobado','Rechazado']),
        ];
    }
}
