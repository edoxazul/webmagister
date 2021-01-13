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
    public $modalInfoCursoFormVisible = false;
    public $modalEnlaceFormVisible = false;
    public $modalCursoConfirmDeleteVisible = false;
    public $modalCurricularFormVisible = false;
    public $modalMallaFormVisible = false;
    public $modalProfundizacionFormVisible = false;
    public $modalCurricularConfirmDeleteVisible = false;
    public $modelId;
    public $isSetToDefaultHomePage;
    public $isSetToDefaultNotFoundPage;

    public $sortField="nombre_curso";
    public $sortDirection = 'asc';

    public $malla,$profundizacion,$nombre_curso,$descripcion_curso,$caracter,$enlace_curso;
    public $archivo_curso;
    public $photo=null;
    public $files_admin=null;

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
            'curriculars'=>Curricular::paginate(1),
        ]);
    }

    public function clear()
    {
        $this->search = '';
        $this->page = '1';
        $this->perPage = '10';

    }

    protected  $messages =[
        'malla.required'=>'El campo malla es obligatorio',
        'profundizacion.required'=>'El campo profundizacion es obligatorio',
        'nombre_curso.required' => 'El campo nombre curso es obligatorio',
        'nombre_curso.unique' => 'el curso ya existe',
        'descripcion_curso.required'=>'El campo descripcion curso es obligatorio',
        'caracter.required'=>'El campo caracter es obligatorio',
        'enlace_curso.required' => 'El campo enlace curso es obligatorio',
        //'archivo_curso.required' => 'El campo archivo curso es obligatorio',
    ];

    public function modelDataCurso(){
        $name = md5($this->enlace_curso . microtime()).'.'.$this->enlace_curso->extension();
        $enlace_curso = $this->enlace_curso->storeAs('cursos',$name,'public');
        $enlace_curso = 'storage/'.$enlace_curso;
        $archivo_curso=$this->enlace_curso->getClientOriginalName();
        return [
            'nombre_curso'=>$this->nombre_curso,
            'descripcion_curso'=>$this->descripcion_curso,
            'caracter'=>$this->caracter,
            'enlace_curso'=>$enlace_curso,
            'archivo_curso'=>$archivo_curso,
        ];
    }

    public function modelDataInfoCurso(){
        return [
            'nombre_curso'=>$this->nombre_curso,
            'descripcion_curso'=>$this->descripcion_curso,
            'caracter'=>$this->caracter,
        ];
    }

    public function modelDataEnlace(){
        $name = md5($this->enlace_curso . microtime()).'.'.$this->enlace_curso->extension();
        $enlace_curso = $this->enlace_curso->storeAs('cursos',$name,'public');
        $enlace_curso = 'storage/'.$enlace_curso;
        return [
            'enlace_curso'=>$enlace_curso,
            //'archivo_curso'=>$enlace_curso,
        ];
    }

    public function modelDataCurricular(){
        $name = md5($this->malla . microtime()).'.'.$this->malla->extension();
        $malla = $this->malla->storeAs('photos',$name,'public');
        $malla = 'storage/'.$malla;
        return [
            'malla'=>$malla,
            'profundizacion'=>$this->profundizacion,
        ];
    }

    public function modelDataMalla(){
        $name = md5($this->malla . microtime()).'.'.$this->malla->extension();
        $malla = $this->malla->storeAs('photos',$name,'public');
        $malla = 'storage/'.$malla;
        return [
            'malla'=>$malla,
        ];
    }

    public function modelDataProfundizacion(){
        return [
            'profundizacion'=>$this->profundizacion,
        ];
    }

    public function createCurso()
    {
        $this->validate(
            [
                'nombre_curso' => 'required|unique:cursos',
                'descripcion_curso' => 'required',
                'caracter'=>'required',
                'enlace_curso'=>'required|mimes:pdf',
            ]
        );
        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        Cursos::create($this->modelDataCurso());
        $this->modalCursoFormVisible = false;
        $this->reset();
    }

    public function createCurricular()
    {
        $this->validate(
            [
                'malla'=>'required|image',
                'profundizacion' => 'required',
            ]
        );
        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        Curricular::create($this->modelDataCurricular());
        $this->modalCurricularFormVisible = false;
        $this->reset();
    }

    public function createCursoShowModal()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalCursoFormVisible = true;
    }

    public function createCurricularShowModal()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalCurricularFormVisible = true;
    }

    public function updateCurso()
    {
        $this->validate(
            [
            'nombre_curso' => 'required|unique:cursos,nombre_curso,'.$this->modelId.'',
            'descripcion_curso' => 'required',
            'caracter'=>'required',
            'enlace_curso'=>'required|mimes:pdf',
            ]
        );

        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        Cursos::find($this->modelId)->update($this->modelDataCurso());
        $this->modalCursoFormVisible = false;
    }

    public function updateInfoCurso()
    {
        $this->validate(
            [
            'nombre_curso' => 'required|unique:cursos,nombre_curso,'.$this->modelId.'',
            'descripcion_curso' => 'required',
            'caracter'=>'required',
            ]
        );

        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        Cursos::find($this->modelId)->update($this->modelDataInfoCurso());
        $this->modalInfoCursoFormVisible = false;
    }

    public function updateEnlace()
    {
        $this->validate(
            [
            'enlace_curso'=>'required|mimes:pdf',
            ]
        );

        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        Cursos::find($this->modelId)->update($this->modelDataEnlace());
        $this->modalEnlaceFormVisible = false;
    }

    public function updateCurricular()
    {
        $this->validate(
            [
            'malla'=>'image',
            'profundizacion' => 'required',
            ]
        );

        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        Curricular::find($this->modelId)->update($this->modelDataCurricular());
        $this->modalCurricularFormVisible = false;
    }

    public function updateMalla()
    {
        $this->validate(
            [
            'malla'=>'required|image',
            ]
        );

        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        Curricular::find($this->modelId)->update($this->modelDataMalla());
        $this->modalMallaFormVisible = false;
    }

    public function updateProfundizacion()
    {
        $this->validate(
            [
            'profundizacion'=>'required',
            ]
        );

        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        Curricular::find($this->modelId)->update($this->modelDataProfundizacion());
        $this->modalProfundizacionFormVisible = false;
    }

    public function updateCursoShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        // $this->reset('photo');
        $this->modelId = $id;
        $this->modalInfoCursoFormVisible = true;
        $this->loadModelCurso();
    }

    public function updateInfoCursoShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        // $this->reset('photo');
        $this->modelId = $id;
        $this->modalInfoCursoFormVisible = true;
        $this->loadModelCurso();
    }

    public function updateEnlaceShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        // $this->reset('photo');
        $this->modelId = $id;
        $this->modalEnlaceFormVisible = true;
        $this->loadModelCurso();
    }

    public function updateCurricularShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        // $this->reset('photo');
        $this->modelId = $id;
        $this->modalCurricularFormVisible = true;
        $this->loadModelCurricular();
    }

    public function updateMallaShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        // $this->reset('photo');
        $this->modelId = $id;
        $this->modalMallaFormVisible = true;
        $this->loadModelCurricular();
    }

    public function updateProfundizacionShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        // $this->reset('photo');
        $this->modelId = $id;
        $this->modalProfundizacionFormVisible = true;
        $this->loadModelCurricular();
    }

    public function loadModelCurso()
    {
        $data = Cursos::find($this->modelId);
        $this->nombre_curso = $data->nombre_curso;
        $this->descripcion_curso = $data->descripcion_curso;
        $this->caracter = $data->caracter;
        $this->enlace_curso = $data->enlace_curso;
        $this->archivo_curso = $data->archivo_curso;
        $this->isSetToDefaultHomePage = !$data->is_default_home ? null : true;
        $this->isSetToDefaultNotFoundPage = !$data->is_default_not_found ? null : true;
    }

    public function loadModelCurricular()
    {
        $data = Curricular::find($this->modelId);
        $this->malla = $data->malla;
        $this->profundizacion = $data->profundizacion;
        $this->isSetToDefaultHomePage = !$data->is_default_home ? null : true;
        $this->isSetToDefaultNotFoundPage = !$data->is_default_not_found ? null : true;
    }

    public function deleteCursoShowModal($id)
    {
        $this->modelId = $id;
        $this->modalCursoConfirmDeleteVisible = true;
    }

    public function deleteCurricularShowModal($id)
    {
        $this->modelId = $id;
        $this->modalCurricularConfirmDeleteVisible = true;
    }

    public function deleteCurso()
    {
        Cursos::destroy($this->modelId);
        $this->modalCursoConfirmDeleteVisible = false;
    }

    public function deleteCurricular()
    {
        Curricular::destroy($this->modelId);
        $this->modalCurricularConfirmDeleteVisible = false;
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
