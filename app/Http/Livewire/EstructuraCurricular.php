<?php

namespace App\Http\Livewire;

use App\Models\Curricular;
use App\Models\Cursos;
use Livewire\Component;
use Livewire\WithFileUploads;

class EstructuraCurricular extends Component
{
    use WithFileUploads;

    protected $queryString = [
        'search' => ['except' =>''],
        'perPage'=> ['except' => '10']
    ];

    public $search= '';
    public $perPage= '10';
    public $page='1';
    public $modalCursoFormVisible = false;
    public $modalCursoConfirmDeleteVisible = false;
    public $modelId;
    public $isSetToDefaultHomePage;
    public $isSetToDefaultNotFoundPage;

    public $sortField="nombre_curso";
    public $sortDirection = 'asc';

    public $malla,$profundizacion,$nombre_curso,$descripcion_curso,$enlace_curso,$archivo_curso;

    public $inputs = [];
    public $i = 1;


    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    public function render()
    {
        return view('livewire.estructura-curricular',[
            'cursos' => Cursos::where('nombre_curso','like','%' . trim($this->search) . '%')
            ->orWhere('descripcion_curso','LIKE',"%{$this->search}%")
            ->orderBy($this->sortField,$this->sortDirection)
            ->paginate($this->perPage),
            'curricular'=>Curricular::paginate(3),
        ]);
    }

    public function clear()
    {
        $this->search = '';
        $this->page = '1';
        $this->perPage = '10';

    }

    protected  $messages =[
        'nombre_curso.required' => 'El campo nombre curso es obligatorio',
        'nombre_curso.unique' => 'el curso ya existe',
        'descripcion_curso.required'=>'El campo descripcion curso es obligatorio',
        'enlace_curso.required' => 'El campo enlace curso es obligatorio',
        'archivo_curso.required' => 'El campo archivo curso es obligatorio',
    ];

    public function modelDataCurso(){
        return [
            'nombre_curso'=>$this->nombre_curso,
            'descripcion_curso'=>$this->descripcion_curso,
            'enlace_curso'=>$this->enlace_curso,
            'archivo_curso'=>$this->archivo_curso,
        ];
    }

    public function createCurso()
    {
        $this->validate(
            [
                'nombre_curso' => 'required|unique:cursos',
                'descripcion_curso' => 'required',
                'enlace_curso'=>'required',
                'archivo_curso'=>'required',
            ]
        );
        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        Cursos::create($this->modelDataCurso());
        $this->modalCursoFormVisible = false;
        $this->reset();
    }

    public function createCursoShowModal()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalCursoFormVisible = true;
    }

    public function updateCurso()
    {
        $this->validate(
            [
            'nombre_curso' => 'required|unique:cursos,nombre_curso,'.$this->modelId.'',
            'descripcion_curso' => 'required',
            'enlace_curso'=>'required',
            'archivo_curso'=>'required',
            ]
        );

        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        Cursos::find($this->modelId)->update($this->modelDataCurso());
        $this->modalCursoFormVisible = false;
    }

    public function updateCursoShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        // $this->reset('photo');
        $this->modelId = $id;
        $this->modalCursoFormVisible = true;
        $this->loadModelCurso();
    }


    public function loadModelCurso()
    {
        $data = Cursos::find($this->modelId);
        $this->nombre_curso = $data->nombre_curso;
        $this->descripcion_curso = $data->descripcion_curso;
        $this->enlace_curso = $data->enlace_curso;
        $this->archivo_curso = $data->archivo_curso;
        $this->isSetToDefaultHomePage = !$data->is_default_home ? null : true;
        $this->isSetToDefaultNotFoundPage = !$data->is_default_not_found ? null : true;
    }

    public function deleteCursoShowModal($id)
    {
        $this->modelId = $id;
        $this->modalCursoConfirmDeleteVisible = true;
    }


    public function deleteCurso()
    {
        Cursos::destroy($this->modelId);
        $this->modalCursoConfirmDeleteVisible = false;
    }

    public function updatedIsSetToDefaultHomePage()
    {
        $this->isSetToDefaultNotFoundPage = null;
    }

    public function updatedIsSetToDefaultNotFoundPage()
    {
        $this->isSetToDefaultHomePage = null;
    }

    private function unassignDefaultHomePage()
    {
        if ($this->isSetToDefaultHomePage != null) {
            Curricular::where('is_default_home', true)->update([
                'is_default_home' => false,
            ]);
        }
    }

    private function unassignDefaultNotFoundPage()
    {
        if ($this->isSetToDefaultNotFoundPage != null) {
            Curricular::where('is_default_not_found', true)->update([
                'is_default_not_found' => false,
            ]);
        }
    }
}
