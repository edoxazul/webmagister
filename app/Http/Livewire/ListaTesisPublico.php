<?php

namespace App\Http\Livewire;

use App\Models\Tesis;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Livewire\Component;

class ListaTesisPublico extends Component
{
    public $search= '';

    protected $queryString = [
        'search' => ['except' =>'']
    ];


    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;
    public $modelId;
    public $isSetToDefaultHomePage;
    public $isSetToDefaultNotFoundPage;
    public $estatus= '';
    public $sortField="titulo";
    public $sortDirection = 'asc';


    public $titulo,$autor,$tutor,$anio_aprobacion,$anteproyecto_path,$resumentesis_path;
    public $archivo_anteproyecto;
    public $archivo_resumentesis;


    public function render()
    {
        return view('livewire.lista-tesis-publico',[
            'tesis' => Tesis::where('titulo','like','%' . trim($this->search) . '%')
            ->orWhere('autor','LIKE',"%{$this->search}%")
            ->orWhere('tutor','LIKE',"%{$this->search}%")
            ->orWhere('estatus','LIKE',"%{$this->search}%")
            ->orWhere('anio_aprobacion','LIKE',"%{$this->search}%")
            ->orderBy($this->sortField,$this->sortDirection)
            ->paginate()
        ])
        ->layout('layouts.guest');
    }

    public function clear()
    {
        $this->search = '';
        $this->page = '1';
        $this->perPage = '10';

    }


    public function modelData()
    {
        return [
            'titulo' => $this->titulo,
            'autor'=>$this->autor,
            'tutor' => $this->tutor,
            'estatus' =>$this->estatus,
            'anteproyecto_path'=> $anteproyecto_path,
            'resumentesis_path'=> $resumentesis_path,
            'archivo_anteproyecto' => $archivo_anteproyecto,
            'archivo_resumentesis' => $archivo_resumentesis,
            'is_default_home' => $this->isSetToDefaultHomePage,
            'is_default_not_found' => $this->isSetToDefaultNotFoundPage,
        ];
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

    public function loadModel()
    {
        $data = Tesis::find($this->modelId);
        $this->titulo = $data->titulo;
        $this->autor = $data->autor;
        $this->tutor = $data->tutor;
        $this->estatus = $data->estatus;
        $this->anteproyecto_path = $data->anteproyecto_path;
        $this->resumentesis_path = $data->resumentesis_path;
        $this->archivo_anteproyecto = $data->archivo_anteproyecto;
        $this->archivo_resumentesis = $data->archivo_resumentesis;
        $this->isSetToDefaultHomePage = !$data->is_default_home ? null : true;
        $this->isSetToDefaultNotFoundPage = !$data->is_default_not_found ? null : true;

    }



}
