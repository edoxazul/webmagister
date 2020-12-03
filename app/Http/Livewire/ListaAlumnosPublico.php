<?php

namespace App\Http\Livewire;

use App\Models\Alumnos;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class ListaAlumnosPublico extends Component
{
    public $search= '';
    public $page='1';
    public $nombre_alumno,$rut_alumno,$nombre_pregrado_alumno,$nombre_institucion_alumno,$contacto_alumno,$estatus_alumno,$anio_ingreso,$linkedin;

    // public function render()
    // {
    //     return view('livewire.lista-alumnos-publico',[
    //         'alumnos' => Alumnos::where('nombre_alumno','like','%' . trim($this->search) . '%')
    //         ->paginate()
    //     ])
    //     ->layout('layouts.guest');
    // }
    public function render()
    {
        return view('livewire.lista-alumnos-publico',[
            'alumnos' => Alumnos::where('estatus_alumno','LIKE',"%{$this->estatus_alumno}%")
            ->paginate()
        ])
        ->layout('layouts.guest');
    }
}
