<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Noticias;
use App\Models\ListaNoticias;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;

class VistaNoticias extends Component
{
    public $modalFormVisible = false;
    public $modalMostrarVisible = false;
    public $modelId;
    public $isSetToDefaultHomePage;
    public $isSetToDefaultNotFoundPage;
    public $titulo_noticia,$descripcion_noticia,$autor_noticia,$enlace_noticia,$estatus,$user_id;
    public $noticia_photo_path;
    public $noticia=null;

    // public $data_noticia=null;

        public function mount($id){
            $this->noticia = Noticias::where('id',$id)->first();
            $this->modelId = $noticia->id;
            $this->titulo_noticia = $noticia->titulo_noticia;
            $this->descripcion_noticia = $noticia->descripcion;
            $this->noticia_photo_path = $noticia->noticia_photo_path;
         }


    public function render()
    {
        return view('livewire.vista-noticias',[
            'noticia'=> Noticias::paginate()
        ])
        ->layout('layouts.guest');
    }

    public function ver($id){
        $noticia = Noticias::where('id',$id)->first();
        // if(!noticia){
        //     abort(404);
        // }
        return view('livewire.vista-noticias',['noticia'=>$noticia]);
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
        $this->noticia_photo_path = $data->noticia_photo_path;
        $this->estatus = $data->estatus;
        $this->isSetToDefaultHomePage = !$data->is_default_home ? null : true;
        $this->isSetToDefaultNotFoundPage = !$data->is_default_not_found ? null : true;
    }

    public function showModal($id){
        $this->modelId = $id;
        $this->modalMostrarVisible = true;
        $this->loadModel();
        // $this->clear();
    }

    public function show(){
        $this->clear();
        $this->modalMostrarVisible = false;
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
