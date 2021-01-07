<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class Noticias extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'titular_noticia',
        'cuerpo_noticia',
        'autor_noticia',
        // 'enlace_noticia',
        'noticia_photo_path',
        'caption_foto_noticia',
        'estado_noticia'
    ];

}
