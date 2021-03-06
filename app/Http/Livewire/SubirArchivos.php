<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\CargaArchivos;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class SubirArchivos extends Component
{
    use WithFileUploads;
    protected $queryString = [
        'search' => ['except' =>''],
        'perPage'=> ['except' => '10']
    ];
    public $modelId;
    public $nombre_archivo, $descripcion_archivo, $enlace_archivo, $archivo;
    public $created_at;
    public $isSetToDefaultHomePage;
    public $isSetToDefaultNotFoundPage;
    public $search= '';
    public $perPage= '10';
    public $page='1';
    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;
    public $files_admin=null;
    public $sortField="created_at";
    public $sortDirection = 'desc';

    public function render()
    {
        return view('livewire.carga-archivos', [
            'archivos' => CargaArchivos::where('created_at','like','%' . trim($this->search) . '%')
            ->orWhere('nombre_archivo','LIKE',"%{$this->search}%")
            ->orWhere('descripcion_archivo','LIKE',"%{$this->search}%")
            ->orderBy($this->sortField,$this->sortDirection)
            ->paginate($this->perPage)
        ]);
    }

    public function clear()
    {
        $this->search = '';
        $this->page = '1';
        $this->perPage = '5';
    }

    public function rules()
    {
        return [
            'nombre_archivo' => 'required',
            'descripcion_archivo' => 'required',
            //'enlace_archivo' => 'required|mimes:pdf,txt,xlsx,xls,pptx,ppt,doc,docx',
        ];
    }

    public function modelData()
    {
        if(!empty($this->files_admin)){

            $name = md5($this->files_admin . microtime()).'.'.$this->files_admin->extension();
            $enlace_archivo = $this->files_admin->storeAs('files_admin',$name,'public');
            $enlace_archivo = 'storage/'.$enlace_archivo;
            $archivo = $this->files_admin->getClientOriginalName();
            return [
                'nombre_archivo' => $this->nombre_archivo,
                'descripcion_archivo' => $this->descripcion_archivo,
                'enlace_archivo'=>$enlace_archivo,
                'archivo' => $archivo,
                'is_default_home' => $this->isSetToDefaultHomePage,
                'is_default_not_found' => $this->isSetToDefaultNotFoundPage,
            ];
        }else{
            return [
                'nombre_archivo' => $this->nombre_archivo,
                'descripcion_archivo' => $this->descripcion_archivo,
                // 'enlace_archivo'=>$this->enlace_archivo,
                'is_default_home' => $this->isSetToDefaultHomePage,
                'is_default_not_found' => $this->isSetToDefaultNotFoundPage,
            ];
        }
    }

    public function create()
    {
        $this->validate();
        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        CargaArchivos::create($this->modelData());
        $this->modalFormVisible = false;
        $this->reset();
    }

    public function createShowModal()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }

    public function update()
    {
        $this->validate();
        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        CargaArchivos::find($this->modelId)->update($this->modelData());
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
        $data = CargaArchivos::find($this->modelId);
        $this->nombre_archivo = $data->nombre_archivo;
        $this->descripcion_archivo = $data->descripcion_archivo;
        $this->enlace_archivo = $data->enlace_archivo;
        $this->archivo = $data->archivo;
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
        CargaArchivos::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
    }

    private function unassignDefaultHomePage()
    {
        if ($this->isSetToDefaultHomePage != null) {
            CargaArchivos::where('is_default_home', true)->update([
                'is_default_home' => false,
            ]);
        }
    }

    private function unassignDefaultNotFoundPage()
    {
        if ($this->isSetToDefaultNotFoundPage != null) {
            CargaArchivos::where('is_default_not_found', true)->update([
                'is_default_not_found' => false,
            ]);
        }
    }

    protected  $messages =[
        'nombre_archivo.required' => 'El campo nombre es obligatorio',
        'descripcion_archivo.required' => 'El campo descripción obligatorio',
        'enlace_archivo.required' => 'El campo subir archivo es obligatorio',
        // 'enlace_archivo.mimes' => 'Formato de archivo inválido.',
        // 'enlace_archivo.mimes:pdf,txt,xlsx,xls,pptx,ppt,doc,docx,zip' => 'Formato de archivo inválido.',
    ];
}
