<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academicos extends Model
{
    use HasFactory;



    protected $fillable = [
        'nombre_academico',
        'rut_academico',
        'fecha_nacimiento',
        'correo',
        'proyecto',
        'publicaciones',
        'user_id',
        'linkedin',
    ];

    //TODO:Se debe agregar las relaciones faltantes











}
