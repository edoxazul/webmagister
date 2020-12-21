<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class Noticias extends Model
{
    use HasFactory;
    use HasTrixRichText;

    protected $guarded = [];

    protected $fillable = [
        'titulo_noticia',
        'descripcion_noticia',
        'autor_noticia',
        'enlace_noticia',
        'noticia_photo_path',
        'estatus'
    ];

}
