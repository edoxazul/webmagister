<?php

namespace App\Http\Livewire;


use App\Models\InfoMagister;
use App\Models\InfoMag;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;

class InfoMagisterPublico extends Component
{
    public $proposito_magister, $objetivo_magister, $descripcion_magister, $perfil_entrada_magister, $regimen_magister, $contacto_magister, $costo_magister, $metodos_pagos_magister, $beneficios_magister, $arancel_magister;

    public function render()
    {
        // return view('livewire.info-magister-publico')->layout('layouts.guest');
        return view('livewire.info-magister-publico',[
            'infomag'=> InfoMagister::paginate()
        ])
        ->layout('layouts.guest');
    }
}
