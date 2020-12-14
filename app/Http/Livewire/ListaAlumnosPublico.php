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
    public $modalFormVisible = false;
    public $page='1';
    public $nombre_alumno,$rut_alumno,$carrera_alumno,$titulo_alumno,$contacto_alumno,$estado_alumno,$anio_ingreso,$linkedin;

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
            'alumnos' => Alumnos::where('estado_alumno','LIKE',"%{$this->estado_alumno}%")
            ->paginate(Alumnos::count())
        ])
        ->layout('layouts.guest');
    }
}
