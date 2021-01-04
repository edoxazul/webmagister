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
    public $titular_noticia,$cuerpo_noticia,$autor_noticia,$estado_noticia,$caption_foto_noticia,$user_id;
    public $created_at;
    public $noticia_photo_path;
    public $sortField="created_at";
    public $sortDirection = 'desc';
    protected $queryString = [
        'search' => ['except' =>''],
        'perPage'=> ['except' => '20']
    ];
    public $search= '';
    public $perPage= '20';
    public $page='1';

    public $data;


    public function render()
    {
        return view('livewire.lista-noticias-publico',[
            // 'noticias'=> Noticias::paginate()
            'noticias' => Noticias::where('created_at','like','%' . trim($this->search) . '%')
            ->orderBy($this->sortField,$this->sortDirection)
            ->paginate($this->perPage)
        ])
        ->layout('layouts.guest');

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
        $this->titular_noticia = $data->titular_noticia;
        $this->cuerpo_noticia = $data->cuerpo_noticia;
        $this->autor_noticia = $data->autor_noticia;
        $this->noticia_photo_path = $data->noticia_photo_path;
        $this->caption_foto_noticia = $data->caption_foto_noticia;
        $this->estado_noticia = $data->estado_noticia;
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
                'titular_noticia' => $this->titular_noticia,
                'cuerpo_noticia' => $this->cuerpo_noticia,
                'autor_noticia'=>$this->autor_noticia,
                'noticia_photo_path'=>$noticia_photo_path,
                'caption_foto_noticia'=>$this->caption_foto_noticia,
                'estado_noticia'=>$this->estado_noticia,
                'is_default_home' => $this->isSetToDefaultHomePage,
                'is_default_not_found' => $this->isSetToDefaultNotFoundPage,
            ];

    }
}
