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
        'anteproyecto_path',
        'resumentesis_path',
        'estatus'
    ];
}
