<?php

namespace App\Http\Livewire;

use App\Models\Tesis;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;
use Livewire\WithFileUploads;



use Livewire\Component;

class ListaTesis extends Component
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
    public $modalConfirmGraduadoVisible = false;
    public $modelId;
    public $isSetToDefaultHomePage;
    public $isSetToDefaultNotFoundPage;
    public $estatus ='Aprobado';
    public $sortField="titulo";
    public $sortDirection = 'asc';
    public $file;
    public $file2;
    public $name;
    public $name2;

    public $titulo,$autor,$tutor,$anteproyecto_path,$resumentesis_path;

    public function render()
    {
        return view('livewire.lista-tesis',[
            'tesis' => Tesis::where('titulo','like','%' . trim($this->search) . '%')
            ->orWhere('autor','LIKE',"%{$this->search}%")
            ->orWhere('tutor','LIKE',"%{$this->search}%")
            ->orWhere('estatus','LIKE',"%{$this->search}%")
            ->orderBy($this->sortField,$this->sortDirection)
            ->paginate($this->perPage)

        ]);
    }

    public function clear()
    {
        $this->search = '';
        $this->page = '1';
        $this->perPage = '10';

    }

    /**
     * The validation rules
     *
     * @return string[]
     */
    public function rules()
    {
        return [
            'titulo' => 'required',
            'autor' => 'required',
            'tutor' => 'required',
            'estatus' => 'required',
            'anteprotecto_path'=>'required',
            'resumentesis_path' => 'required',


        ];

    }

    protected  $messages =[
        'titulo.required' => 'El campo del título es obligatorio',
        'autor.required' => 'El campo del autor es obligatorio',
        'tutor.unique' => 'El campo del tutor es obligatorio',
        'estatus.required' => 'El estatus es obligatorio',
        'anteproyecto_path.required' => 'El campo subir anteproyecto es obligatorio',
        // 'photo.image' => 'Debe ingresar una foto',
        // 'photo.max:1024' => 'La foto ingresada debe ser menor a 1MB'
    ];

    public function modelData()
    {
        $name = md5($this->file . microtime()).'.'.$this->file->extension();
        $name2 = md5($this->file2 . microtime()).'.'.$this->file2->extension();
        $anteproyecto_path= $this->file->storeAs('files',$name,'public');
        $resumentesis_path= $this->file2->storeAs('files',$name2,'public');

        return [
            'titulo' => $this->titulo,
            'autor'=>$this->autor,
            'tutor' => $this->tutor,
            'estatus' =>$this->estatus,
            'anteproyecto_path'=> $anteproyecto_path,
            'resumentesis_path'=> $resumentesis_path,
            'is_default_home' => $this->isSetToDefaultHomePage,
            'is_default_not_found' => $this->isSetToDefaultNotFoundPage,
        ];
    }



    public function create()
    {
        $this->validate();
        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        Tesis::create($this->modelData());
        $this->inputs = [];
        $this->modalFormVisible = false;
        $this->reset();
    }


    /**
     * Shows the form modal
     * of the create function.
     *
     * @return void
     */
    public function createShowModal()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }


    public function update()
    {
        $this->validate(
            [
            'titulo' => 'required',
            'autor'=>'required',
            'tutor' => 'required',
            'estatus' => 'required',
            // 'photo' => 'max:1024'

            ]
        );

        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        Tesis::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
    }


    public function updateShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->modelId = $id;
        $this->modalFormVisible = true;
        $this->loadModel();
    }

    public function loadModel()
    {
        $data = Tesis::find($this->modelId);
        $this->titulo = $data->titulo;
        $this->autor = $data->autor;
        $this->tutor = $data->tutor;
        $this->estatus = $data->estatus;
        $this->anteproyecto_path = $data->anteproyecto_path;
        $this->resumentesis_path = $data->resumentesis_path;
        $this->isSetToDefaultHomePage = !$data->is_default_home ? null : true;
        $this->isSetToDefaultNotFoundPage = !$data->is_default_not_found ? null : true;

    }


    /**
     * Runs everytime the isSetToDefaultHomePage
     * variable is updated.
     *
     * @return void
     */
    public function updatedIsSetToDefaultHomePage()
    {
        $this->isSetToDefaultNotFoundPage = null;
    }

    /**
     * Runs everytime the isSetToDefaultNotFoundPage
     * variable is updated.
     *
     * @return void
     */
    public function updatedIsSetToDefaultNotFoundPage()
    {
        $this->isSetToDefaultHomePage = null;
    }


    public function deleteShowModal($id)
    {
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
    }


    public function delete()
    {
        Tesis::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
    }

    private function unassignDefaultHomePage()
    {
        if ($this->isSetToDefaultHomePage != null) {
            Tesis::where('is_default_home', true)->update([
                'is_default_home' => false,
            ]);
        }
    }

    private function unassignDefaultNotFoundPage()
    {
        if ($this->isSetToDefaultNotFoundPage != null) {
            Tesis::where('is_default_not_found', true)->update([
                'is_default_not_found' => false,
            ]);
        }
    }

    public function eliminado(){
        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        $tesis=Tesis::find($this->modelId);
        $tesis->estatus = 'Eliminado';
        $tesis->save();
        $this->reset();
        $this->modalConfirmDeleteVisible = false;
    }



}
