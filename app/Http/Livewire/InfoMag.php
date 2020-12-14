<?php

namespace App\Http\Livewire;

use App\Models\InfoMagister;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

use Livewire\WithFileUploads;

class InfoMag extends Component
{
    use WithFileUploads;
    public $modelId;
    public $proposito_magister, $objetivo_magister, $descripcion_magister, $perfil_entrada_magister, $regimen_magister, $contacto_magister, $costo_magister, $metodos_pagos_magister, $beneficios_magister, $arancel_magister;
    // public $files = [];
    // public $archivos_magister;
    public $isSetToDefaultHomePage;
    public $isSetToDefaultNotFoundPage;
    // public $name;


    // public function upload()
    // {
    //     $this->validate([
    //         'files.*' => 'file|max:1024', // 1MB Max
    //     ]);

    //     foreach ($this->files as $file) {
    //         $name = md5($this->file . microtime()).'.'.$this->file->extension();
    //         $files->storeAs('files', $name);
    //         InfoMagister::create(['archivo_programa_magister' => $name]);
    //     }

    // }

    public function submitForm()
    {
        $this->validate([
            'proposito_magister' => 'required',
            'objetivo_magister' => 'required',
            'descripcion_magister' => 'required',
            'perfil_entrada_magister' => 'required',
            'regimen_magister' => 'required',
            'contacto_magister' => 'required',
            'costo_magister' => 'required',
            'metodos_pagos_magister' => 'required',
            'beneficios_magister' => 'required',
            'arancel_magister' => 'required',
            // 'archivos_magister' => 'required'
        ]);
        InfoMagister::create($this->modelData());
        $this->success = '¡Información agregada!';
        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();

    }
/***
 *
 *

  public function create()
    {
        $this->validate();
        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        InfoMagister::create($this->modelData());
       // $this->modalFormVisible = false;
        $this->success = '¡Información agregada!';
        //$this->reset();
    }
 */

           // método para tratar de mandar datos a la vista

        public function mount (){
            $infomag_data= InfoMagister::find(1);
            $this->modelId = $infomag_data->id;
            $this->proposito_magister = $infomag_data->proposito_magister;
            $this->objetivo_magister = $infomag_data->objetivo_magister;
            $this->descripcion_magister = $infomag_data->descripcion_magister;
            $this->perfil_entrada_magister = $infomag_data->perfil_entrada_magister;
            $this->regimen_magister = $infomag_data->regimen_magister;
            $this->contacto_magister = $infomag_data->contacto_magister;
            $this->costo_magister = $infomag_data->costo_magister;
            $this->metodos_pagos_magister = $infomag_data->metodos_pagos_magister;
            $this->beneficios_magister = $infomag_data->beneficios_magister;
            $this->arancel_magister = $infomag_data->arancel_magister;
            // $this->archivos_magister = $infomag_data->archivos_magister;
        }

    public function render()
    {
        //funciona
        // return view('livewire.info-magister',[
        //     'infomag'=> InfoMagister::paginate()
        // ]);

        return view('livewire.info-magister',[
            'infomag'=> InfoMagister::paginate()
        ]);
    }
    public function rules()
    {
        return [
            'proposito_magister' => 'required',
            'objetivo_magister' => 'required',
            'descripcion_magister' => 'required',
            'perfil_entrada_magister' => 'required',
            'regimen_magister' => 'required',
            'contacto_magister' => 'required',
            'costo_magister' => 'required',
            'metodos_pagos_magister' => 'required',
            'beneficios_magister' => 'required',
            'arancel_magister' => 'required',
            // 'archivos_magister' => 'required|mimes:pdf'
        ];
    }

    public function create()
    {
        $this->validate();
        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        InfoMagister::create($this->modelData());
        $this->success = '¡Información agregada!';
    }

    public function modelData()
    {
        return [
            'proposito_magister' => $this->proposito_magister,
            'objetivo_magister' => $this->objetivo_magister,
            'descripcion_magister'=>$this->descripcion_magister,
            'perfil_entrada_magister'=>$this->perfil_entrada_magister,
            'regimen_magister'=>$this->regimen_magister,
            'contacto_magister'=>$this->contacto_magister,
            'costo_magister'=>$this->costo_magister,
            'metodos_pagos_magister'=>$this->metodos_pagos_magister,
            'beneficios_magister'=>$this->beneficios_magister,
            'arancel_magister'=>$this->arancel_magister,
            // 'archivos_magister' => $this->archivos_magister,
            'is_default_home' => $this->isSetToDefaultHomePage,
            'is_default_not_found' => $this->isSetToDefaultNotFoundPage,
        ];
    }

    private function unassignDefaultNotFoundPage()
    {
        if ($this->isSetToDefaultNotFoundPage != null) {
            InfoMagister::where('is_default_not_found', true)->update([
                'is_default_not_found' => false,
            ]);
        }
    }

        /**
     * The update function.
     *
     * @return void
     */

    public function update()
    {
        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        // $this->upload();
        InfoMagister::find($this->modelId)->update($this->modelData());
        session()->flash('message', 'Los cambios se han realizado con éxito.');
        // $this->modalFormVisible = false;
    }

    public function visualizar($id){
        $this->resetValidation();
        $this->reset();
        $this->modelId = $id;
        $this->loadModel();
    }

    // public function updateShowModal($id)
    // {
    //     $this->resetValidation();
    //     $this->reset();
    //     $this->modelId = $id;
    //     $this->modalFormVisible = true;
    //     $this->loadModel();
    // }

    public function loadModel()
    {
        $data = InfoMagister::find($this->modelId);
        $this->proposito_magister = $data->proposito_magister;
        $this->objetivo_magister = $data->objetivo_magister;
        $this->descripcion_magister = $data->descripcion_magister;
        $this->perfil_entrada_magister = $data->perfil_entrada_magister;
        $this->regimen_magister = $data->regimen_magister;
        $this->contacto_magister = $data->contacto_magister;
        $this->costo_magister = $data->costo_magister;
        $this->metodos_pagos_magister = $data->metodos_pagos_magister;
        $this->beneficios_magister = $data->beneficios_magister;
        $this->arancel_magister = $data->arancel_magister;
        // $this->archivos_magister = $data->archivos_magister;
        $this->isSetToDefaultHomePage = !$data->is_default_home ? null : true;
        $this->isSetToDefaultNotFoundPage = !$data->is_default_not_found ? null : true;
    }

    protected  $messages =[
        'proposito_magister.required' => 'El campo propósito es obligatorio',
        'objetivo_magister.required' => 'El campo objetivo es obligatorio',
        'descripcion_magister.required' => 'El campo descripción es obligatorio',
        'perfil_entrada_magister.required' => 'El campo perfil de entrada es obligatorio',
        'regimen_magister.required' => 'El campo régimen es obligatorio',
        'contacto_magister.required' => 'El campo contacto es obligatorio',
        'costo_magister.required' => 'El campo costo es obligatorio',
        'metodos_pagos_magister.required' => 'El campo métodos de pago es obligatorio',
        'beneficios_magister.required' => 'El campo beneficios y facilidades es obligatorio',
        'arancel_magister.required' => 'El campo aranceles es obligatorio',
        'archivos_magister.required' => 'El campo archivos es obligatorio',
        // 'archivos_magister.mimes:pdf'=> 'El archivo debe ser en formato PDF',
    ];

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
            InfoMagister::where('is_default_home', true)->update([
                'is_default_home' => false,
            ]);
        }
    }





}
