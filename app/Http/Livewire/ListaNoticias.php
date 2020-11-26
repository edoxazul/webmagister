<?php

namespace App\Http\Livewire;
use App\Models\Noticias;
use Livewire\Component;

class ListaNoticias extends Component
{
    public $search= '';
    public $perPage= '5';
    public $page='1';
    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;
    public $modelId;

    public $titulo_noticia,$descripcion_noticia,$autor_noticia,$enlace_noticia,$user_id;

    public function render()
    {
        return view('livewire.lista-noticias',[
            'noticias' => Noticias::where('titulo_noticia','like','%' . trim($this->search) . '%')
            ->paginate($this->perPage)
        ]);
    }

    public function clear()
    {
        $this->search = '';
        $this->page = '1';
        $this->perPage = '5';

    }

    public function create()
    {
        $this->validate();
        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        Noticias::create($this->modelData());
        $this->modalFormVisible = false;
        $this->reset();
    }


    public function createShowModal()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }

    public function deleteShowModal($id)
    {
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
    }

    public function delete()
    {
        Noticias::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
    }
}
