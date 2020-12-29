<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curricular extends Model
{
    use HasFactory;

    protected $fillable = [
        'malla',
        'supervisado',
    ];
}
