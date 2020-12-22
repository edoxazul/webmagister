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
        'pasaporte',
        'carrera_alumno',
        'contacto_alumno',
        'estado_alumno',
        'razon_eliminacion',
        'anio_ingreso',
        'anio_graduacion',
        'trabajo_tesis',
        'linkedin',
    ];

    //Relacion uno a muchos (inversa)
    public function academico(){
        return $this->belongsTo(Academicos::class);
    }









}
