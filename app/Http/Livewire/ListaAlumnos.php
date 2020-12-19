<?php

namespace App\Http\Livewire;

use App\Models\Alumnos;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;
use Livewire\Component;
use Livewire\WithFileUploads;

class ListaAlumnos extends Component
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
    public $estado_alumno='Regular';
    public $profile_photo_path;

    public $sortField="nombre_alumno";
    public $sortDirection = 'asc';


    public $nombre_alumno,$rut_alumno,$pasaporte,$carrera_alumno,$contacto_alumno,$razon_eliminacion,$anio_ingreso,$anio_graduacion,$trabajo_anteproyecto,$linkedin;


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
        return view('livewire.lista-alumnos',[
            'alumnos' => Alumnos::where('nombre_alumno','like','%' . trim($this->search) . '%')
            ->orWhere('contacto_alumno','LIKE',"%{$this->search}%")
            ->orWhere('estado_alumno','LIKE',"%{$this->search}%")
            ->orderBy($this->sortField,$this->sortDirection)
            ->paginate($this->perPage)

        ]);
    }

    public function upload()
    {
        $name = md5($this->photo . microtime()).'.'.$this->photo->extension();

        $this->photo->storeAs('photos', $name);

        Alumnos::create(['profile_photo_path' => $name]);
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
            'nombre_alumno' => 'required|unique:alumnos',
            'rut_alumno' => 'required|unique:alumnos|cl_rut',
            'pasaporte'=>'unique:alumnos',
            'carrera_alumno' => 'required',
            'contacto_alumno' => 'required|unique:alumnos',
            'estado_alumno' => 'required',
            'anio_ingreso' => 'required',
        ];

    }

    protected  $messages =[
        'nombre_alumno.required' => 'El campo del nombre es obligatorio',
        'nombre_alumno.unique' => 'Ya existe ese alumno',
        'rut_alumno.required' => 'El campo del rut es obligatorio',
        'rut_alumno.unique' => 'El rut ya existe',
        'rut_alumno.cl_rut' => 'El campo del rut no es valido',
        'pasaporte.unique'=>'Ya existe un alumno con ese pasaporte',
        'carrera_alumno.required' => 'El campo carrera es obligatorio',
        'contacto_alumno.required' => 'El campo del correo es obligatorio',
        'contacto_alumno.unique' => 'El correo ya fue registrado anteriormente',
        'estado_alumno.required' => 'El estatus es obligatorio',
        'anio_ingreso.required'=>'La fecha de nacimiento es obligatoria'
    ];

    public function modelData()
    {
        if(!empty($this->photo)){

            $name = md5($this->photo . microtime()).'.'.$this->photo->extension();

            $profile_photo_path = $this->photo->storeAs('photos',$name,'public');
            $profile_photo_path = 'storage/'.$profile_photo_path;

            return [
                'nombre_alumno' => $this->nombre_alumno,
                'rut_alumno' => $this->rut_alumno,
                'pasaporte'=>$this->pasaporte,
                'carrera_alumno'=>$this->carrera_alumno,
                'contacto_alumno'=>$this->contacto_alumno,
                'estado_alumno'=>$this->estado_alumno,
                'razon_eliminacion'=>$this->razon_eliminacion,
                'anio_ingreso'=>$this->anio_ingreso,
                'anio_graduacion'=>$this->anio_graduacion,
                'trabajo_anteproyecto' =>$this->trabajo_anteproyecto,
                'linkedin'=>$this->linkedin,
                'profile_photo_path'=>$this->profile_photo_path,
                'is_default_home' => $this->isSetToDefaultHomePage,
                'is_default_not_found' => $this->isSetToDefaultNotFoundPage,
            ];
        }else{
            return [
                'nombre_alumno' => $this->nombre_alumno,
                'rut_alumno' => $this->rut_alumno,
                'pasaporte'=>$this->pasaporte,
                'carrera_alumno'=>$this->carrera_alumno,
                'contacto_alumno'=>$this->contacto_alumno,
                'estado_alumno'=>$this->estado_alumno,
                'razon_eliminacion'=>$this->razon_eliminacion,
                'anio_ingreso'=>$this->anio_ingreso,
                'anio_graduacion'=>$this->anio_graduacion,
                'trabajo_anteproyecto' =>$this->trabajo_anteproyecto,
                'linkedin'=>$this->linkedin,
                //'profile_photo_path'=>$this->profile_photo_path,
                'is_default_home' => $this->isSetToDefaultHomePage,
                'is_default_not_found' => $this->isSetToDefaultNotFoundPage,
            ];
        }

    }


    /**
     * The create function.
     *
     * @return void
     */
    public function create()
    {
        $this->validate();
        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        Alumnos::create($this->modelData());
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

    /**
     * The update function.
     *
     * @return void
     */
    public function update()
    {
        $this->validate(
            [
                'nombre_alumno' => 'required',
                'rut_alumno' => 'required|unique:alumnos,rut_alumno,'.$this->modelId.'|cl_rut',
                'pasaporte'=>'unique:alumnos',
                'carrera_alumno' => 'required',
                'contacto_alumno' => 'required|unique:alumnos,contacto_alumno,'.$this->modelId.'',
                'estado_alumno' => 'required',
                'anio_ingreso' => 'required',
            ]
        );

        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        Alumnos::find($this->modelId)->update($this->modelData());
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
        $data = Alumnos::find($this->modelId);
        $this->nombre_alumno = $data->nombre_alumno;
        $this->rut_alumno = $data->rut_alumno;
        $this->pasaporte = $data->pasaporte;
        $this->carrera_alumno = $data->carrera_alumno;
        $this->contacto_alumno = $data->contacto_alumno;
        $this->estado_alumno = $data->estado_alumno;
        $this->razon_eliminacion = $data->razon_eliminacion;
        $this->anio_ingreso = $data->anio_ingreso;
        $this->anio_graduacion = $data->anio_graduacion;
        $this->trabajo_anteproyecto = $data->trabajo_anteproyecto;
        $this->linkedin = $data->linkedin;
        $this->profile_photo_path = $data->profile_photo_path;
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
        Alumnos::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
    }

    public function eliminado(){
        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        $alumnos=Alumnos::find($this->modelId);
        $alumnos->estado_alumno = 'Eliminado';
        $alumnos->razon_eliminacion = $this->razon_eliminacion;
        $alumnos->save();
        $this->reset();
        $this->modalConfirmDeleteVisible = false;
    }

    public function graduadoShowModal($id)
    {
        $this->modelId = $id;
        $this->modalConfirmGraduadoVisible = true;
    }

    public function graduado(){
        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        $alumnos=Alumnos::find($this->modelId);
        $alumnos->estado_alumno = 'Graduado';
        $alumnos->anio_graduacion = $this->anio_graduacion;
        $alumnos->save();
        $this->reset();
        $this->modalConfirmGraduadoVisible = false;
    }


    private function unassignDefaultHomePage()
    {
        if ($this->isSetToDefaultHomePage != null) {
            Alumnos::where('is_default_home', true)->update([
                'is_default_home' => false,
            ]);
        }
    }

    private function unassignDefaultNotFoundPage()
    {
        if ($this->isSetToDefaultNotFoundPage != null) {
            Alumnos::where('is_default_not_found', true)->update([
                'is_default_not_found' => false,
            ]);
        }
    }

}
