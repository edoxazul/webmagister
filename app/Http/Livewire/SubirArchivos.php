<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\CargaArchivos;
use Livewire\WithFileUploads;

class SubirArchivos extends Component
{
    use WithFileUploads;
    public $modelId;
    public $nombre_archivo, $descripcion_archivo, $enlace_archivo;
    public $isSetToDefaultHomePage;
    public $isSetToDefaultNotFoundPage;
    // public $archivos = [];
    public $search= '';
    public $perPage= '10';
    public $page='1';
    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;

    public function render()
    {
        return view('livewire.carga-archivos', [
            'archivos' => CargaArchivos::where('nombre_archivo','like','%' . trim($this->search) . '%')
            ->paginate($this->perPage)
        ]);
    }

    public function GuardarArchivos()
    {
        $this->validate([
            'archivos.*' => 'archivo|max:1024', // 1MB Max
        ]);

        foreach ($this->archivo as $archivos) {
            $archivos->store('archivos');
        }
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
            'enlace_archivo' => 'required',
        ];
    }

    public function modelData()
    {
        return [
            'nombre_archivo' => $this->nombre_archivo,
            'descripcion_archivo' => $this->descripcion_archivo,
            'enlace_archivo'=>$this->enlace_archivo,
            'is_default_home' => $this->isSetToDefaultHomePage,
            'is_default_not_found' => $this->isSetToDefaultNotFoundPage,
        ];
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

}
