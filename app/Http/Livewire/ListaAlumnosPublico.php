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
    public $modalMostrarVisible = false;
    public $modelId;
    public $page='1';
    public $nombre_alumno,$rut_alumno,$carrera_alumno,$contacto_alumno,$estado_alumno,$razon_eliminacion,$anio_ingreso,$anio_graduacion,$trabajo_tesis,$linkedin;

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

    public function modelData()
    {
        return [
            'nombre_alumno' => $this->nombre_alumno,
            'rut_alumno' => $this->rut_alumno,
            'carrera_alumno'=>$this->carrera_alumno,
            'contacto_alumno'=>$this->contacto_alumno,
            'estado_alumno'=>$this->estado_alumno,
            'razon_eliminacion'=>$this->razon_eliminacion,
            'anio_ingreso'=>$this->anio_ingreso,
            'anio_graduacion'=>$this->anio_graduacion,
            'trabajo_tesis' =>$this->trabajo_tesis,
            'linkedin'=>$this->linkedin,
            'is_default_home' => $this->isSetToDefaultHomePage,
            'is_default_not_found' => $this->isSetToDefaultNotFoundPage,
        ];
    }

    public function loadModel()
    {
        $data = Alumnos::find($this->modelId);
        $this->nombre_alumno = $data->nombre_alumno;
        $this->rut_alumno = $data->rut_alumno;
        $this->carrera_alumno = $data->carrera_alumno;
        $this->contacto_alumno = $data->contacto_alumno;
        $this->estado_alumno = $data->estado_alumno;
        $this->razon_eliminacion = $data->razon_eliminacion;
        $this->anio_ingreso = $data->anio_ingreso;
        $this->anio_graduacion = $data->anio_graduacion;
        $this->trabajo_tesis = $data->trabajo_tesis;
        $this->linkedin = $data->linkedin;
        $this->isSetToDefaultHomePage = !$data->is_default_home ? null : true;
        $this->isSetToDefaultNotFoundPage = !$data->is_default_not_found ? null : true;

    }
}
