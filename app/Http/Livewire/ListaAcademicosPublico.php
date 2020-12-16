<?php

namespace App\Http\Livewire;

use App\Models\Academicos;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class ListaAcademicosPublico extends Component
{
    public $modalFormVisible = false;
    public $modalMostrarVisible = false;
    public $modelId;
    public $estatus= '';
    public $nombre_academico,$rut_academico,$fecha_nacimiento,$correo,$grado_academico,$proyecto,$publicaciones,$user_id,$linkedin,$trabajo_tesis_supervisado;
    public $isSetToDefaultHomePage;
    public $isSetToDefaultNotFoundPage;


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

    public function showModal($id){
        $this->modelId = $id;
        $this->modalMostrarVisible = true;
        $this->loadModel();
        $this->clear();
    }

    public function show(){
        $this->clear();
        $this->modalMostrarVisible = false;
    }

    public function modelData()
    {
        return [
            'nombre_academico' => $this->nombre_academico,
            'rut_academico' => $this->rut_academico,
            'fecha_nacimiento'=>$this->fecha_nacimiento,
            'grado_academico'=>$this->grado_academico,
            'correo'=>$this->correo,
            'proyecto'=>$this->proyecto,
            'publicaciones'=>$this->publicaciones,
            'estatus'=>$this->estatus,
            'razon_eliminacion'=>$this->razon_eliminacion,
            'profile_photo_path'=>$profile_photo_path,
            'linkedin'=>$this->linkedin,
            'trabajo_tesis_supervisado' =>$this->trabajo_tesis_supervisado,
            'is_default_home' => $this->isSetToDefaultHomePage,
            'is_default_not_found' => $this->isSetToDefaultNotFoundPage,
        ];
    }

    public function loadModel()
    {
        $data = Academicos::find($this->modelId);
        $this->nombre_academico = $data->nombre_academico;
        $this->rut_academico = $data->rut_academico;
        $this->profile_photo_path = $data->profile_photo_path;
        $this->fecha_nacimiento = $data->fecha_nacimiento;
        $this->grado_academico = $data->grado_academico;
        $this->correo = $data->correo;
        $this->proyecto = $data->proyecto;
        $this->publicaciones = $data->publicaciones;
        $this->estatus = $data->estatus;
        $this->razon_eliminacion = $data->razon_eliminacion;
        $this->linkedin = $data->linkedin;
        $this->trabajo_tesis_supervisado = $data->trabajo_tesis_supervisado;
        $this->isSetToDefaultHomePage = !$data->is_default_home ? null : true;
        $this->isSetToDefaultNotFoundPage = !$data->is_default_not_found ? null : true;

    }




}
