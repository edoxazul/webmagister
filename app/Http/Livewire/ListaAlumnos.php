<?php

namespace App\Http\Livewire;

use App\Models\Alumnos;
use Livewire\WithPagination;
use Livewire\Component;

class ListaAlumnos extends Component
{
    protected $queryString = [
        'search' => ['except' =>''],
        'perPage'=> ['except' => '5']
    ];

    public $search= '';
    public $perPage= '5';
    public $page='1';
    public $modalConfirmDeleteVisible = false;
    public $modelId;

    public $nombre_alumno,$rut_alumno,$nombre_pregrado_alumno,$nombre_institucion_alumno,$contacto_alumno,$anio_ingreso,$user_id,$linkedin;

    public function render()
    {
        return view('livewire.lista-alumnos',[
            'alumnos' => Alumnos::where('nombre_alumno','like','%' . trim($this->search) . '%')
            ->orWhere('contacto_alumno','LIKE',"%{$this->search}%")
            ->orWhere('estatus_alumno','LIKE',"%{$this->search}%")
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
    public function crearAlumno()
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


        $this->nombre_alumno = '';
        $this->rut_alumno = '';
        $this->anio_inicio = '';

    }

    public function deleteShowModal($id)
    {
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
    }

    public function delete()
    {
        Alumnos::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
    }
}
