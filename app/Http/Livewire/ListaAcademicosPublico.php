<?php

namespace App\Http\Livewire;

use App\Models\Academicos;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class ListaAcademicosPublico extends Component
{

    public $search= '';
    public $page='1';
    public $nombre_academico,$rut_academico,$fecha_nacimiento,$correo,$grado_academico,$estatus,$proyecto,$publicaciones,$user_id,$linkedin;






    public function render()
    {
        return view('lista-academicos-publico',[
            'academicos' => Academicos::where('nombre_academico','like','%' . trim($this->search) . '%')
            ->paginate()
        ])

        ->layout('layouts.guest');


    }









}
