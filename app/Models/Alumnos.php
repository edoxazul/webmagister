<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    use HasFactory;


    protected $fillable = [
        'nombre_alumno',
        'rut_alumno',
        'nombre_pregrado_alumno',
        'nombre_institucion_alumno',
        'contacto_alumno',
        'estatus_alumno',
        'razon_eliminacion',
        'anio_ingreso',
        'anio_graduacion',
        'trabajo_tesis',
        'linkedin',
    ];









}
