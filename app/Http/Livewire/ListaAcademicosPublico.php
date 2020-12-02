<?php

namespace App\Http\Livewire;

use App\Models\Academicos;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class ListaAcademicosPublico extends Component
{

    public $estatus= '';
    public $nombre_academico,$rut_academico,$fecha_nacimiento,$correo,$grado_academico,$proyecto,$publicaciones,$user_id,$linkedin;

    public function render()
    {
        return view('livewire.lista-academicos-publico',[
            'academicos' => Academicos::where('estatus','LIKE',"%{$this->estatus}%")
            ->paginate()
        ])
        ->layout('layouts.guest');


    }


    public function clear()
    {
        $this->estatus='';
    }



}
