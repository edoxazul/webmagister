<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $modelData)
 * @method static find($modelId)
 * @method static where(string $string, bool $true)
 */
class Academicos extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nombre_academico',
        'rut_academico',
        'fecha_nacimiento',
        'grado_academico',
        'correo',
        'proyecto',
        'publicaciones',
        'estatus',
        'user_id',
        'linkedin',
    ];

    //TODO:Se debe agregar las relaciones faltantes


}
