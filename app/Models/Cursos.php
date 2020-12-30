<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    protected $fillable = [
        'nombre_curso',
        'descripcion_curso',
        'enlace_curso',
        'archivo_curso',
    ];

    use HasFactory;
}
