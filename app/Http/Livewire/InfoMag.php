<?php

namespace App\Http\Livewire;

use App\Models\InfoMagister;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class InfoMag extends Component
{

    public $modelId;
    public $proposito_magister, $objetivo_magister, $descripcion_magister, $perfil_entrada_magister, $regimen_magister, $contacto_magister, $costo_magister, $metodos_pagos_magister, $beneficios_magister, $arancel_magister;

    public $isSetToDefaultHomePage;
    public $isSetToDefaultNotFoundPage;

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
            'arancel_magister' => 'required'
        ]);
        // InfoMagister::create([
        //     'proposito_magister' => 'required',
        //     'objetivo_magister' => 'required',
        //     'descripcion_magister' => 'required',
        //     'perfil_entrada_magister' => 'required',
        //     'regimen_magister' => 'required',
        //     'contacto_magister' => 'required',
        //     'costo_magister' => 'required',
        //     'metodos_pagos_magister' => 'required',
        //     'beneficios_magister' => 'required',
        //     'arancel_magister' => 'required'
        // ]);
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

    public function render()
    {
        return view('livewire.info-magister');
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
            'arancel_magister' => 'required'
        ];
    }

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
            'is_default_home' => $this->isSetToDefaultHomePage,
            'is_default_not_found' => $this->isSetToDefaultNotFoundPage,
        ];
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
            InfoMagister::where('is_default_home', true)->update([
                'is_default_home' => false,
            ]);
        }
    }

    private function unassignDefaultNotFoundPage()
    {
        if ($this->isSetToDefaultNotFoundPage != null) {
            InfoMagister::where('is_default_not_found', true)->update([
                'is_default_not_found' => false,
            ]);
        }
    }


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

        $this->isSetToDefaultHomePage = !$data->is_default_home ? null : true;
        $this->isSetToDefaultNotFoundPage = !$data->is_default_not_found ? null : true;
    }





}
