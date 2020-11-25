<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Academicos extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $dates = ['deleted_at'];

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
