<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
// use App\Models\Alumnos;

/**
 * @method static create(array $modelData)
 * @method static find($modelId)
 * @method static where(string $string, bool $true)
 */
class Academicos extends Model
{
    use HasFactory;
    // use SoftDeletes;


    // protected $dates = ['deleted_at'];

    protected $fillable = [
        'nombre_academico',
        'rut_academico',
        'fecha_nacimiento',
        'grado_academico',
        'correo',
        'proyecto',
        'publicaciones',
        'profile_photo_path',
        'estatus',
        'razon_eliminacion',
        'user_id',
        'linkedin',
        'trabajo_tesis_supervisado'
    ];

    //TODO:Se debe agregar las relaciones faltantes

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_path',
    ];

    //Relacion uno a muchos
    public function alumnos() {
        return $this->hasMany(Alumnos::class);
    }



}
