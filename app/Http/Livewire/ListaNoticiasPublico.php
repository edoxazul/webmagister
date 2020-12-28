<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Noticias;
use App\Models\ListaNoticias;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;

class ListaNoticiasPublico extends Component
{
    public $modalFormVisible = false;
    public $modalMostrarVisible = false;
    public $modelId;
    public $isSetToDefaultHomePage;
    public $isSetToDefaultNotFoundPage;
    public $titulo_noticia,$descripcion_noticia,$autor_noticia,$enlace_noticia,$estatus,$user_id;
    public $noticia_photo_path;

    public $data;


    public function render()
    {
        return view('livewire.lista-noticias-publico',[
            'noticias'=> Noticias::paginate()
        ])
        ->layout('layouts.guest');

    }

    public function visualizar($id){
        // $this->data = Noticia::find($id);
        $this->modelId = $id;
        $this->modalFormVisible = true;
        $this->loadModel();
    }


    public function createShowModal()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }

    public function loadModel()
    {
        $data = Noticias::find($this->modelId);
        $this->titulo_noticia = $data->titulo_noticia;
        $this->descripcion_noticia = $data->descripcion_noticia;
        $this->autor_noticia = $data->autor_noticia;
        $this->enlace_noticia = $data->enlace_noticia;
        $this->estatus = $data->estatus;
        $this->isSetToDefaultHomePage = !$data->is_default_home ? null : true;
        $this->isSetToDefaultNotFoundPage = !$data->is_default_not_found ? null : true;
    }

    public function modelData()
    {
            return [
                'titulo_noticia' => $this->titulo_noticia,
                'descripcion_noticia' => $this->descripcion_noticia,
                'autor_noticia'=>$this->autor_noticia,
                'enlace_noticia'=>$this->enlace_noticia,
                'noticia_photo_path'=>$noticia_photo_path,
                'estatus'=>$this->estatus,
                'is_default_home' => $this->isSetToDefaultHomePage,
                'is_default_not_found' => $this->isSetToDefaultNotFoundPage,
            ];

    }
}
