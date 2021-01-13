<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class CargaArchivos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_archivo',
        'descripcion_archivo',
        'enlace_archivo',
        'archivo'
    ];
}
