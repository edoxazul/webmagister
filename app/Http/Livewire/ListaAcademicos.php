<?php

namespace App\Http\Livewire;


use App\Models\Academicos;

use Livewire\Component;
use Livewire\WithPagination;


class ListaAcademicos extends Component
{

    use WithPagination;

    protected $queryString = [
        'search' => ['except' =>''],
        'perPage'=> ['except' => '5']
    ];

    public $search= '';
    public $perPage= '5';



    public function render()
    {
        return view('livewire.lista-academicos',[
            'academicos' => Academicos::where('nombre_academico','LIKE',"%{$this->search}%")
            ->orWhere('correo','LIKE',"%{$this->search}%")
            ->orWhere('estatus','LIKE',"%{$this->search}%")
            ->paginate($this->perPage)
        ]);
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '5';

    }



}
