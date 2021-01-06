<?php

namespace App\Http\Livewire;

use App\Models\Curricular;
use App\Models\Cursos;
use Livewire\Component;

class EstructuraCurricularPublico extends Component
{
    public $search= '';
    public $modalFormVisible = false;
    public $modalMostrarVisible = false;
    public $modelId;

    public $malla,$profundizacion,$nombre_curso,$descripcion_curso,$enlace_curso,$archivo_curso;

    public function render()
    {
        return view('livewire.estructura-curricular-publico',[
            'cursos' => Cursos::where('nombre_curso','LIKE',"%{$this->nombre_curso}%")
            ->orderBy('nombre_curso','asc')
            ->paginate(Cursos::count()),
            'curriculars'=>Curricular::paginate(1),
        ])
        ->layout('layouts.guest');
    }

    public function clear()
    {
        $this->estado_alumno='';
    }

    public function showModal($id){
        $this->modelId = $id;
        $this->modalMostrarVisible = true;
        $this->loadModel();
    }

    public function show(){
        $this->clear();
        $this->modalMostrarVisible = false;
    }
}
