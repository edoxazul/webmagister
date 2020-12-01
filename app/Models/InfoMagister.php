<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoMagister extends Model
{
    use HasFactory;

    protected $fillable = [
        'proposito_magister',
        'objetivo_magister',
        'descripcion_magister',
        'perfil_entrada_magister',
        'regimen_magister',
        'perfil_entrada_magister',
        'regimen_magister',
        'contacto_magister',
        'costo_magister',
        'metodos_pagos_magister',
        'beneficios_magister',
        'arancel_magister'
    ];
}
