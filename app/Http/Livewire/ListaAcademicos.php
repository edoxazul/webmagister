<?php

namespace App\Http\Livewire;


use App\Models\Academicos;

use Livewire\Component;
use Livewire\WithPagination;


class ListaAcademicos extends Component
{

    // use WithPagination;

    protected $queryString = [
        'search' => ['except' =>''],
        'perPage'=> ['except' => '5']
    ];

    public $search= '';
    public $perPage= '5';
    public $page='1';
    public $modalConfirmDeleteVisible = false;
    public $modelId;

    public $nombre_academico,$rut_academico,$fecha_nacimiento,$correo,$proyecto,$publicaciones,$user_id,$linkedin;

    // /**
    //  * The livewire mount function
    //  *
    //  * @return void
    //  */
    // public function mount()
    // {
    //     // Resets the pagination after reloading the page
    //     $this->resetPage();
    // }

    public function render()
    {
        return view('livewire.lista-academicos',[
            'academicos' => Academicos::where('nombre_academico','like','%' . trim($this->search) . '%')
            ->orWhere('correo','LIKE',"%{$this->search}%")
            ->orWhere('estatus','LIKE',"%{$this->search}%")
            ->paginate($this->perPage)
        ]);
    }

    public function clear()
    {
        $this->search = '';
        $this->page = '1';
        $this->perPage = '5';

    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function crearAcademico()
    {
        $this->resetInputFields();

    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function resetInputFields()
    {


        $this->nombre_academico = '';
        $this->rut_academico = '';
        $this->fecha_nacimiento = '';

    }






    public function deleteShowModal($id)
    {
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
    }

    public function delete()
    {
        Academicos::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
    }


}
