<?php

namespace App\Http\Livewire;

use App\Models\Academicos;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;


class ListaAcademicos extends Component
{

    use WithFileUploads;
    // use WithPagination;

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
    public $estatus ='Claustro';
    public $grado_academico='Magíster';
    public $profile_photo_path;
    public $photo;

    public $sortField="nombre_academico";
    public $sortDirection = 'asc';


    public $nombre_academico,$rut_academico,$fecha_nacimiento,$correo,$proyecto,$publicaciones,$user_id,$linkedin,$trabajo_tesis_supervisado;
    public $razon_eliminacion;

    public $updateMode = false;
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
            ->orWhere('rut_academico','LIKE',"%{$this->search}%")
            ->orderBy($this->sortField,$this->sortDirection)
            ->paginate($this->perPage)

        ]);
    }

    public function upload()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);

        $name = md5($this->photo . microtime()).'.'.$this->photo->extension();

        $this->photo->storeAs('photos', $name);


        Academicos::create(['profile_photo_path' => $name]);
        // $profile_photo_path = $this->photo->store('photos','public');
              // dd($url);


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
            'nombre_academico' => 'required',
            'rut_academico' => 'required|unique:academicos|cl_rut',
            'fecha_nacimiento' => 'required',
            'grado_academico' => 'required',
            'correo' => 'required|unique:academicos',
            'estatus' => 'required',
            'photo' => 'image|max:1024'
            // 'estatus' => 'required'

        ];

    }

    protected  $messages =[
        'nombre_academico.required' => 'El campo del nombre es obligatorio',
        'rut_academico.required' => 'El campo del rut es obligatorio',
        'rut_academico.unique' => 'El rut ya existe',
        'rut_academico.cl_rut' => 'El campo del rut no es valido',
        'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria',
        'grado_academico.required' => 'El campo del grado academico es obligatorio',
        'correo.required' => 'El campo del correo es obligatorio',
        'correo.unique' => 'El correo ya fue registrado anteriormente',
        'estatus.required' => 'El estatus es obligatorio',
        'photo.image' => 'Debe ingresar una foto',
        'photo.max:1024' => 'La foto ingresada debe ser menor a 1MB'
    ];

    public function modelData()
    {
        $name = md5($this->photo . microtime()).'.'.$this->photo->extension();

        $url = $this->photo->storeAs('photos', $name,'public');

        $photopath = 'storage/'.$url;


        return [
            'nombre_academico' => $this->nombre_academico,
            'rut_academico' => $this->rut_academico,
            'fecha_nacimiento'=>$this->fecha_nacimiento,
            'grado_academico'=>$this->grado_academico,
            'correo'=>$this->correo,
            'proyecto'=>$this->proyecto,
            'publicaciones'=>$this->publicaciones,
            'estatus'=>$this->estatus,
            'razon_eliminacion'=>$this->razon_eliminacion,
            'profile_photo_path'=>$photopath,
            'linkedin'=>$this->linkedin,
            'trabajo_tesis_supervisado' =>$this->trabajo_tesis_supervisado,
            'is_default_home' => $this->isSetToDefaultHomePage,
            'is_default_not_found' => $this->isSetToDefaultNotFoundPage,
        ];


    }


    /**
     * The create function.
     *
     * @return void
     */
    public function create()
    {
        $this->validate();
            // 'nombre_academico' => 'required',
            // 'rut_academico' => 'required',
            // 'fecha_nacimiento' => 'required',
            // 'grado_academico' => 'required',
            // 'correo' => 'required',
            // 'estatus' => 'required',
            // 'likedin' => 'required'
        // ]);

        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        Academicos::create($this->modelData());
        // $this->inputs = [];
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

    /**
     * The update function.
     *
     * @return void
     */
    public function update()
    {
        $this->validate(
            [
            'nombre_academico' => 'required',
            'rut_academico' => 'required|unique:academicos,rut_academico,'.$this->modelId.'|cl_rut',
            'fecha_nacimiento' => 'required',
            'grado_academico' => 'required',
            'correo' => 'required|unique:academicos,correo,'.$this->modelId.'',
            'estatus' => 'required',
            'photo' => 'image:academicos,profile_photo_path,'.$this->modelId.'|max:1024'

            ]
        );

        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        Academicos::find($this->modelId)->update($this->modelData());
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
        $data = Academicos::find($this->modelId);
        $this->nombre_academico = $data->nombre_academico;
        $this->rut_academico = $data->rut_academico;
        $this->profile_photo_path = $data->profile_photo_path;
        $this->fecha_nacimiento = $data->fecha_nacimiento;
        $this->grado_academico = $data->grado_academico;
        $this->correo = $data->correo;
        $this->proyecto = $data->proyecto;
        $this->publicaciones = $data->publicaciones;
        $this->estatus = $data->estatus;
        $this->razon_eliminacion = $data->razon_eliminacion;
        $this->linkedin = $data->linkedin;
        $this->trabajo_tesis_supervisado = $data->trabajo_tesis_supervisado;
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
        Academicos::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
    }

    public function eliminado(){
        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        $academicos=Academicos::find($this->modelId);
        $academicos->estatus = 'Eliminado';
        $academicos->razon_eliminacion = $this->razon_eliminacion;
        $academicos->save();
        $this->reset();
        $this->modalConfirmDeleteVisible = false;
    }


    private function unassignDefaultHomePage()
    {
        if ($this->isSetToDefaultHomePage != null) {
            Academicos::where('is_default_home', true)->update([
                'is_default_home' => false,
            ]);
        }
    }

    private function unassignDefaultNotFoundPage()
    {
        if ($this->isSetToDefaultNotFoundPage != null) {
            Academicos::where('is_default_not_found', true)->update([
                'is_default_not_found' => false,
            ]);
        }
    }


}
