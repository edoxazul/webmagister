<?php

namespace App\Http\Livewire;

use App\Models\Curricular;
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
    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;
    public $modelId;
    public $isSetToDefaultHomePage;
    public $isSetToDefaultNotFoundPage;

    public $malla,$profundizacion,$nombre_curso,$descripcion_curso;

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

        ]);
    }

    public function clear()
    {
        $this->search = '';
        $this->page = '1';
        $this->perPage = '10';

    }

    public function rules()
    {
        return [
            'malla' => 'required|image',
            'profundizacion' => 'required',
            'nombre_curso' => 'required|unique:cursos',
            'descripcion_curso' => 'required',
        ];

    }

    protected  $messages =[
        'malla.required' => 'El campo malla es obligatorio',
        'malla.image' => 'El campo malla debe ser una imagen',
        'profundizacion.required' => 'El campo profundizacion es obligatorio',
        'nombre_curso.required' => 'El campo nombre curso es obligatorio',
        'nombre_curso.unique' => 'el curso ya existe',
        'descripcion_curso.required' => 'El campo descripcion curso es obligatorio',
    ];

    public function modelData(){
        return [
            'malla' => $this->malla,
            'profundizacion' => $this->profundizacion,
            'nombre_curso'=>$this->nombre_curso,
            'descripcion'=>$this->descripcion,
        ];
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
