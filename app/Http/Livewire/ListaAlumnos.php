<?php

namespace App\Http\Livewire;

use App\Models\Alumnos;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
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
    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;
    public $modelId;
    public $isSetToDefaultHomePage;
    public $isSetToDefaultNotFoundPage;

    public $nombre_alumno,$rut_alumno,$nombre_pregrado_alumno,$nombre_institucion_alumno,$contacto_alumno,$estatus_alumno,$anio_ingreso,$user_id,$linkedin,$razon_eliminacion,$anio_graduacion,$trabajo_tesis;

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

    public function rules()
    {
        return [
            'nombre_alumno' => 'required',
            'rut_alumno' => 'required|unique:alumnos|cl_rut',
            'nombre_pregrado_alumno' => 'required',
            'nombre_institucion_alumno' => 'required',
            'contacto_alumno' => 'required|unique:alumnos',
            'estatus_alumno' => 'required',
            'anio_ingreso' => 'required',

        ];
    }
    /*
    para actualizar campos
    */
    public function modelData()
    {
        return [
            'nombre_alumno' => $this->nombre_alumno,
            'rut_alumno' => $this->rut_alumno,
            'nombre_pregrado_alumno'=>$this->nombre_pregrado_alumno,
            'nombre_institucion_alumno'=>$this->nombre_institucion_alumno,
            'contacto_alumno'=>$this->contacto_alumno,
            'estatus_alumno'=>$this->estatus_alumno,
            'razon_eliminacion'=>$this->razon_eliminacion,
            'anio_ingreso'=>$this->anio_ingreso,
            'anio_graduacion'=>$this->anio_graduacion,
            'trabajo_tesis'=>$this->trabajo_tesis,
            'linkedin'=>$this->linkedin,
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
        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        Alumnos::create($this->modelData());
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
                'nombre_pregrado_alumno' => 'required',
                'nombre_institucion_alumno' => 'required',
                'contacto_alumno' => 'required|unique:alumnos,contacto_alumno,'.$this->modelId.'',
                'anio_ingreso' => 'required',
                'estatus_alumno' => 'required'
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
        $this->nombre_pregrado_alumno = $data->nombre_pregrado_alumno;
        $this->nombre_institucion_alumno = $data->nombre_institucion_alumno;
        $this->contacto_alumno = $data->contacto_alumno;
        $this->estatus_alumno = $data->estatus_alumno;
        $this->razon_eliminacion = $data->razon_eliminacion;
        $this->anio_ingreso = $data->anio_ingreso;
        $this->anio_graduacion = $data->anio_graduacion;
        $this->trabajo_tesis = $data->trabajo_tesis;
        $this->linkedin = $data->linkedin;
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

    protected  $messages =[
        'nombre_alumno.required'  => 'El campo nombre es obligatorio',
        'rut_alumno.required'  => 'El campo rut es obligatorio',
        'rut_alumno.unique' => 'El rut ya existe',
        'rut_alumno.cl_rut' => 'El campo del rut no es valido',
        'nombre_pregrado_alumno.required'  => 'El campo carrera es obligatorio',
        'nombre_institucion_alumno.required'  => 'El campo institucion es obligatorio',
        'contacto_alumno.required'  => 'El campo correo es obligatorio',
        'contacto_alumno.unique' => 'El correo ya fue registrado anteriormente',
        'anio_ingreso.required'  => 'El campo año de ingreso es obligatorio',
        'estatus_alumno.required'  => 'El campo estado es obligatorio',
    ];

    public function eliminado(){
        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        $alumnos=Alumnos::find($this->modelId);
        $alumnos->estatus_alumno = 'Eliminado';
        $alumnos->save();
        $this->modalConfirmDeleteVisible = false;
    }

}
