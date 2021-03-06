<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tesis extends Model
{
    use HasFactory;


    protected $fillable = [
        'titulo',
        'autor',
        'tutor',
        'anio_aprobacion',
        'anteproyecto_path',
        'resumentesis_path',
        'archivo_anteproyecto',
        'archivo_resumentesis',
        'estatus'
    ];

    public function academicos(){
        return $this->belongsToMany(Academicos::class);
    }

    public function alumnos(){
        return $this->belongsToMany(Alumnos::class);
    }



}
