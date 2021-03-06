<?php

namespace Database\Factories;

use App\Models\Noticias;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NoticiasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Noticias::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //Título de la noticia
            'titular_noticia'=>$this->faker->text(200),
            //Descripción de la noticia
            'cuerpo_noticia'=>$this->faker->text(),
            //Autor de la noticia. No es obligatorio
            'autor_noticia'=>$this->faker->name(),
            //Enlace a una noticia externa, si existe.
            // 'enlace_noticia'=>$this->faker->url,
            //Foto de la noticia
            'noticia_photo_path'=>$this->faker->imageUrl($width = 640, $height = 480),
            //Texto descriptivo de la foto
            'caption_foto_noticia'=>$this->faker->text(),
            //Estado de la noticia. Para fines de eliminación. Al eliminar una noticia se cambia el estatus
            // a "no visible"
            'estado_noticia'=>$this->faker->randomElement(['Visible','No visible']),
        ];
    }
}
